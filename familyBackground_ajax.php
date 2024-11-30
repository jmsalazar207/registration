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
$searchQuery = " WHERE empno = '$session_empno' AND status !=4  ";
if($searchValue != ''){
   $searchQuery .= "AND (empno LIKE '%".$searchValue."%' OR
               relation LIKE '%".$searchValue."%' OR
               surname LIKE '%".$searchValue."%' OR
               firstname LIKE '%".$searchValue."%' OR
               middlename LIKE '%".$searchValue."%' OR
               extname LIKE '%".$searchValue."%' OR
               businessName LIKE '%".$searchValue."%' OR
               businessAddress LIKE '%".$searchValue."%' OR
               telephoneNo LIKE '%".$searchValue."%' OR
               birthday LIKE '%".$searchValue."%')";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount FROM lib_family_background");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount FROM lib_family_background"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT * FROM lib_family_background
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$id = $row['id'];
   $url = "familyBackgroundDelete.php";
   $relation = $row['relation'];
   if($relation ==1){
      $relation = 'Spouse';
   }
   if($relation ==2){
      $relation = 'Children';
   }
   if($relation ==3){
      $relation = 'Father';
   }
   if($relation ==4){
      $relation = 'Mother';
   }
   $action = "
            <td>
               <button class='btn btn-primary btn-sm' id = 'btnUserFamilyBackgroundUpdate' name ='btnUserFamilyBackgroundUpdate' value = '$id'  title='View' >
                  Update 
               </button>
            </td>
            <td>
               <button class='btn btn-danger btn-sm' id = 'btnUserDeleteFamilyBackground' name ='btnUserDeleteFamilyBackground' data-valueID = '$id' data-valueURL = '$url'  title='Remove' >
                  Remove
               </button>
            </td>
            "; 
   
   $data[] = array(
      "Action" => $action,
      "relation" => $relation,
      "surname" => $row['surname'],
      "firstname" => $row['firstname'],
      "middlename" => $row['middlename'],
      "extname" => $row['extname'],
      "birthday" => $row['birthday']
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