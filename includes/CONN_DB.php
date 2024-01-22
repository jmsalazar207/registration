<?php
	//$conn = new mysqli('localhost', 'root', '', 'ctris');
	// $conn_ctris = new mysqli('172.31.32.251', 'remote_user', 'P@ssw0rd1.', 'ctris');
	// if ($conn_ctris->connect_error) {
	//     die("Connection failed: " . $conn_ctris->connect_error);
	// }

	

	/**
 * Kailangan pa ng class nato ng refactoring
 * Wala pang part para sa table JOIN
 * Wala din part para sa Union / All
 */
    

 class CONN_DB{
	private static $_instance =  null;
	private $_pdo, $_query, $_error = false, $_result, $_count = 0, $_lastInsertID = null;

	private function __construct(){
		try{
			// mysql:host=localhost;dbname=sample;charset=utf8', 'root', ''
			$this->_pdo = new PDO('mysql:host=172.31.32.251;dbname=registration;charset=utf8', 'remote_user', 'P@ssw0rd1.');
			//  $this->_pdo = new PDO('mysql:host=localhost;dbname=registration;charset=utf8', 'root', '');
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public static function connect(){
	   return new self();
	}
	//=======================================query=======================================
	private function query($sql, $params = []){            
		$this->_error = false;
		if($this->_query = $this->_pdo->prepare($sql)){            
			$x = 1;
			if(count($params)){
				foreach($params as $param){
					$this->_query->bindValue($x,$param);
					$x++;
				}
			}
		}
		if($this->_query->execute()){
			$this->_result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
			$this->_count = $this->_query->rowCount();
			$this->_lastInsertID = $this->_pdo->lastInsertId();
		}else{
			$this->_error = true;
		}
		return $this;
	}
	//=======================================query=======================================

	//=======================================sp_query=======================================
	public function sp_query($sql){            
		if(!$this->query($sql)->error()){
			if(!count($this->_result)) return false;
			return true;
		}
	}
	//=======================================sp_query=======================================









	
	//=======================================read========================================        
	protected function read($table, $params=[]){
		$fieldString = '';
		$conditionString = '';
		$bind = [];
		$order = '';
		$limit = '';
		$group = '';
		
		$fieldString = (array_key_exists('fields',$params))?$params['fields']:'*';

		// conditions
		if(isset($params['conditions'])){
			foreach($params['conditions'] as $field => $value){
				$conditionString .=  ' ' . $field . ' = ? AND';
				$bind[] = $value;
			}
			$conditionString = trim($conditionString);
			$conditionString = rtrim($conditionString, ' AND');
			if($conditionString != ''){
				$conditionString = ' WHERE ' . $conditionString;
			}
		} //conditions
		
		//group
		if(array_key_exists('group',$params)){
			$group = ' GROUP BY ' . $params['group'];
		}

		// order
		if(array_key_exists('order',$params)){
			$order = ' ORDER BY ' . $params['order'];
		}

		// limit
		if(array_key_exists('limit', $params)){
			$limit = ' LIMIT ' . $params['limit'];
		}

		$sql = "SELECT {$fieldString} FROM $table {$conditionString}{$group}{$order}{$limit}";
		if(!$this->query($sql, $bind)->error()){
			if(!count($this->_result)) return false;
			return true;
		}
		return false;
	}
	//=======================================read========================================









	
	//=======================================find========================================
	public function find($table, $params=[]){
		if($this->read($table,$params)){
			return $this->results();
		}
		return false;
	}

	public function findQuery($query, $params=[]){
		if(!$this->query($query,$params)->error()){
			if(!count($this->_result)) return false;
			return $this->results();
		}
		return false;
	}

	public function findFirst($table, $params=[]){
		if($this->read($table, $params)){
			return $this->first();
		}
		return false;
	}

	public function findFirstQuery($query,$params=[]){
		if(!$this->query($query,$params)->error()){
			if(!count($this->_result)) return false;
			return $this->first();
		}
		return false;
	}
	//=======================================find========================================









	
	//=======================================insert========================================
	public function insert($table,$fields = []){
		$fieldString = '';
		$valueString = '';
		$values = [];        
		foreach($fields as $field => $value){
			$fieldString .= '`' . $field . '`,';
			$valueString .= '?,';
			$values[] = $value;
		}
		$fieldString = rtrim($fieldString,',');
		$valueString = rtrim($valueString,',');
		$sql = "INSERT INTO {$table} ({$fieldString}) VALUES({$valueString})";
		if(!$this->query($sql,$values)->error()){
			return true;
		}
		
		return false;
	}
	//=======================================insert========================================









	
	//=======================================update========================================
	public function update($table,$column,$id,$fields = []){
		$fieldString = '';
		$values = [];
		foreach($fields as $field => $value){
			$fieldString .= ' ' . $field . ' = ?,';
			$values[] = $value;
		}
		$fieldString = trim($fieldString);
		$fieldString = rtrim($fieldString,',');
		$sql = "UPDATE {$table} SET {$fieldString} WHERE {$column} = '{$id}'";
		if(!$this->query($sql,$values)->error()){
			return true;
		}
		return false;
	}

	public function updateQuery($sql,$params = []){
		if(!$this->query($sql,$params)->error()){
			return true;
		}
		return false;
	}
	//=======================================update========================================









	
	//=======================================truncate========================================
	public function truncate($table){
		$sql = "TRUNCATE TABLE {$table}";
		if(!$this->query($sql)->error()){
			return true;
		}
		return false;
	}
	//=======================================truncate========================================









	
	//=======================================delete========================================
	public function delete($table, $column, $id){
		$sql = "DELETE FROM {$table} WHERE {$column} = {$id}";
		if(!$this->query($sql)->error()){
			return true;
		}
		return false;
	}//delete

	public function deleteQuery($query, $params=[]){
		if(!$this->query($query,$params)->error()){
			return true;
		}
		return false;
	}//delete
	//=======================================delete========================================









	
	public function beginTransaction(){
		$this->_pdo->beginTransaction();
	}

	public function commit(){
		$this->_pdo->commit();
	}

	public function rollback(){
		$this->_pdo->rollBack();
	}
	
	public function results(){
		return $this->_result;
	}

	public function first(){
		return (!empty($this->_result)) ? $this->_result[0] : [];
	}

	public function count(){
		return $this->_count;
	}

	public function lastID(){
		return $this->_lastInsertID;
	}

	public function getColumns($table){
		return $this->query("SHOW COLUMNS FROM {$table}")->results();
	}

	public function error(){
		return $this->_error;
	}


}
?>