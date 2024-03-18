<?php
session_start();
header('Content-Type: application/json');
require_once('includes/init.php');

$data = array(); //array return value
$totalRecords = 0; // total number of records
$totalRecordwithFilter = 0; // result of filter


## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value


## Search 
$searchQuery = " WHERE 1 ";
if($searchValue != ''){
   $searchQuery .= "AND (up.empno LIKE '%".$searchValue."%' OR
                        up.sname LIKE '%".$searchValue."%' OR
                        up.mname LIKE '%".$searchValue."%' OR
                        up.fname LIKE '%".$searchValue."%' OR
                        up.ename LIKE '%".$searchValue."%' OR
                        pos.position_name LIKE '%".$searchValue."%' OR
                        d.division_name LIKE '%".$searchValue."%' OR
                        u.unit_name LIKE '%".$searchValue."%' )";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount FROM userprofile");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount  
                                    FROM userprofile up
                                    JOIN lib_position pos ON pos.position_code =  up.position
                                    JOIN lib_division d ON d.division_code = up.division
                                    JOIN lib_unit u ON u.unit_code = up.unit".$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT up.empno, CONCAT(up.sname,' ',up.fname,' ', up.mname,' ', up.ename) AS fullname, 
            up.mobile, up.eaddress, pos.position_name, d.division_name, u.unit_name
            FROM userprofile up
            JOIN lib_position pos ON pos.position_code =  up.position
            JOIN lib_division d ON d.division_code = up.division
            JOIN lib_unit u ON u.unit_code = up.unit
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";
// echo $sql_emp;
// die();
$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$empno = $row['empno'];
	// $fname= $row['fname'];
	// $sname = $row['sname'];
	// $mname = $row['mname'];
	// $position = $row['position_name'];
	// $divison = $row['division_name'];
	// $unit = $row['unit_name'];   
   
   
   $data[] = array(
      "empno" => $empno,
      "fullname" => $row['fullname'],
      "mobile" => $row['mobile'],
      "eaddress" => $row['eaddress'],
      "position_name" => $row['position_name'],
      "division_name" => $row['division_name'],
      "unit_name" => $row['unit_name']);
   }
}


   ## Response
   $response = array(
   "draw" => intval($draw),
   "iTotalRecords" => $totalRecords,
   "iTotalDisplayRecords" => $totalRecordwithFilter,
   "aaData" => $data
   );

   echo json_encode($response);