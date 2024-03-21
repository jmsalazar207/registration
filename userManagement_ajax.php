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
            p.position_name LIKE '%".$searchValue."%' OR
            d.division_name LIKE '%".$searchValue."%' OR
            un.unit_name LIKE '%".$searchValue."%' )";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount FROM userprofile");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount  FROM userprofile u
                                    LEFT JOIN lib_division d ON d.division_code = u.division
                                    LEFT JOIN lib_unit un ON un.unit_code = u.unit
                                    LEFT JOIN lib_position p ON p.position_code = u.position".$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT u.empno, u.sname, u.fname, u.mname, p.position_name, d.division_name, un.unit_name FROM userprofile u
               LEFT JOIN lib_division d ON d.division_code = u.division
               LEFT JOIN lib_unit un ON un.unit_code = u.unit
               LEFT JOIN lib_position p ON p.position_code = u.position
               $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

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
   
    $action = "<td>
                  <button class='' onclick ='adminUpdate(this.value)' value = '$empno'  title='View' >
                     View Info
                  </button>
                  <button class='' onclick ='adminApprove(this.value)' value = '$empno'  title='View' >
                  Review
                  </button>
               </td>";  
   
   $data[] = array(
      "Action" => $action,
      "empno" => $empno,
      "sname" => $row['sname'],
      "fname" => $row['fname'],
      "mname" => $row['mname'],
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