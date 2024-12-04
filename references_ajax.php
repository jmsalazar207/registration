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
$session_empno = $_SESSION['userID'];
$searchQuery = " WHERE empno = '$session_empno' AND ref_status !=4 ";
if($searchValue != ''){
   $searchQuery .= "AND (empno LIKE '%".$searchValue."%' OR
                    ref_name LIKE '%".$searchValue."%' OR
                    ref_address LIKE '%".$searchValue."%' OR
                    ref_mobile LIKE '%".$searchValue."%')";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount FROM lib_references");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount FROM lib_references"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT * FROM lib_references
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$id = $row['id'];
   $url = "referencesDelete.php";

   $action = "
            <td>
               <button class='btn btn-info btn-sm' id = 'btnUserReferencesUpdate' name ='btnUserReferencesUpdate' value = '$id'  title='View' >
                  Update
               </button>
            </td>
            <td>
               <button class='btn btn-danger btn-sm' id = 'btnUserReferencesDelete' name ='btnUserReferencesDelete' data-valueID = '$id' data-valueURL = '$url'>
                  Remove
               </button>
            </td>
            "; 
   
   $data[] = array(
      "Action" => $action,
      "ref_name" => $row['ref_name'],
      "ref_address" => $row['ref_address'],
      "ref_mobile" => $row['ref_mobile']
   );
      
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