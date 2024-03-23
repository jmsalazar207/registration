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
   $searchQuery .= "AND (u.empno LIKE '%".$searchValue."%' OR
            u.sname LIKE '%".$searchValue."%' OR
            u.fname LIKE '%".$searchValue."%' OR
            u.mname LIKE '%".$searchValue."%' OR
            u.ename LIKE '%".$searchValue."%' OR
            ac.account_status_name LIKE '%".$searchValue."%' OR
            p.position_name LIKE '%".$searchValue."%' OR
            d.division_name LIKE '%".$searchValue."%' OR
            un.unit_name LIKE '%".$searchValue."%' )";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount FROM userprofile");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount  FROM userprofile u
                                    JOIN lib_account_status ac ON u.account_status = ac.account_status_code
                                    LEFT JOIN lib_division d ON d.division_code = u.division
                                    LEFT JOIN lib_unit un ON un.unit_code = u.unit
                                    LEFT JOIN lib_position p ON p.position_code = u.position"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT u.empno, u.sname, u.fname, u.mname, u.ename, p.position_name, d.division_name, un.unit_name, u.account_status ,ac.account_status_name
            FROM userprofile u
            JOIN lib_account_status ac ON u.account_status = ac.account_status_code
            LEFT JOIN lib_division d ON d.division_code = u.division
            LEFT JOIN lib_unit un ON un.unit_code = u.unit
            LEFT JOIN lib_position p ON p.position_code = u.position  
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$empno = $row['empno']; 
   $acc_status = $row['account_status'];
   if($acc_status ==1 || $acc_status ==3){
      $action = "<td>
                  <button class='' id = 'btnAdminUpdate' name ='btnAdminUpdate' onclick ='adminUpdate(this.value)' value = '$empno'  title='View' >
                     View Info
                  </button>
                  <button class='' id='btnAdminApprove' name= 'btnAdminApprove' onclick ='adminApprove(this.value)' value = '$empno'  title='View' >
                  Review
                  </button>
               </td>"; 
   
   }else if($acc_status == 2){
      $action = "<td>
                  <button class='' id = 'btnAdminUpdate' name ='btnAdminUpdate' onclick ='adminUpdate(this.value)' value = '$empno'  title='View' >
                     View Info
                  </button>
                  <button class='' id='btnAdminLock' name= 'btnAdminLock' onclick ='adminLock(this.value)' value = '$empno'  title='View' >
                  Lock Account
                  </button>
               </td>";
   }else if($acc_status == 4){
      $action = "<td>
                  <button class='' id = 'btnAdminUpdate' name ='btnAdminUpdate' onclick ='adminUpdate(this.value)' value = '$empno'  title='View' >
                     View Info
                  </button>
                  <button class='' id='btnAdminUnlock' name= 'btnAdminUnlock' onclick ='adminUnLock(this.value)' value = '$empno'  title='View' >
                  Unlock Account
                  </button>
                </td>";
   }else{
      $action =   "<td>
                     <button class='' id = 'btnAdminUpdate' name ='btnAdminUpdate' onclick ='adminUpdate(this.value)' value = '$empno'  title='View' >
                        View Info
                     </button>
                  </td>
                  ";
   }
     
   
   $data[] = array(
      "Action" => $action,
      "empno" => $empno,
      "sname" => $row['sname'],
      "fname" => $row['fname'],
      "mname" => $row['mname'],
      "ename" => $row['ename'],
      "position_name" => $row['position_name'],
      "division_name" => $row['division_name'],
      "unit_name" => $row['unit_name'],
      "account_status_name" => $row['account_status_name']);
      
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