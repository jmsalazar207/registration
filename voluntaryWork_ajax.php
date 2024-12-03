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
$searchQuery = " WHERE empno = '$session_empno' AND vw_status !=4 ";
if($searchValue != ''){
   $searchQuery .= "AND (empno LIKE '%".$searchValue."%' OR
                    vw_name_address LIKE '%".$searchValue."%' OR
                    vw_date_from LIKE '%".$searchValue."%' OR
                    vw_date_to LIKE '%".$searchValue."%' OR
                    vw_no_hrs LIKE '%".$searchValue."%' OR
                    vw_position LIKE '%".$searchValue."%')";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount FROM lib_voluntary");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount FROM lib_voluntary"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT *, concat(vw_date_from,' ','to',' ',vw_date_to) as period FROM lib_voluntary
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$id = $row['id'];
   $url = "voluntaryWorkDelete.php"; 

   $action = "
            <td>
               <button class='btn btn-primary btn-sm' id = 'btnUserVoluntaryUpdate' name ='btnUserVoluntaryUpdate' value = '$id'  title='View' >
                  Update
               </button>
            </td>
            <td>
               <button class='btn btn-danger btn-sm' id = 'btnUserVoluntaryDelete' name ='btnUserVoluntaryDelete' data-valueID ='$id' data-valueURL='$url'  title='Remove Information' >
                  Remove
               </button>
            </td>
            "; 
   
   $data[] = array(
      "Action" => $action,
      "vw_name_address" => $row['vw_name_address'],
      "period" => $row['period'],
      "vw_no_hrs" => $row['vw_no_hrs'],
      "vw_position" => $row['vw_position']
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