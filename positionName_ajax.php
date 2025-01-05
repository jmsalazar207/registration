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
$searchQuery = " WHERE pn.status <1 ";
if($searchValue != ''){
   $searchQuery .= " AND (
            pn.position_name LIKE '%".$searchValue."%' OR
            pn.position_initial LIKE '%".$searchValue."%' OR
            uadd.fname LIKE '%".$searchValue."%' OR
            uadd.mname LIKE '%".$searchValue."%' OR
            uadd.sname LIKE '%".$searchValue."%' OR
            uadd.ename LIKE '%".$searchValue."%' OR
            uup.fname LIKE '%".$searchValue."%' OR
            uup.mname LIKE '%".$searchValue."%' OR
            uup.sname LIKE '%".$searchValue."%' OR
            uup.ename LIKE '%".$searchValue."%' OR
            pn.datetime_added LIKE '%".$searchValue."%' OR
            pn.datetime_updated LIKE '%".$searchValue."%'
            )";
}

## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(position_name_id) as allcount
                                    FROM lib_position_name");
$totalRecords = $records['allcount'];

## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(pn.position_name_id) as allcount
                                    FROM lib_position_name pn
                                    LEFT JOIN userprofile uadd ON uadd.empno = pn.added_by
                                    LEFT JOIN userprofile uup ON uup.empno = pn.updated_by"
                                    .$searchQuery);

$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql = "SELECT pn.position_name_id, pn.position_name, pn.position_initial, CONCAT(uadd.fname,' ',uadd.mname,' ',uadd.sname,' ', uadd.ename) AS added_by, 
        pn.datetime_added, CONCAT(uup.fname,' ',uup.mname,' ',uup.sname,' ', uup.ename) AS updated_by, pn.datetime_updated
        FROM lib_position_name pn
        LEFT JOIN userprofile uadd ON uadd.empno = pn.added_by
        LEFT JOIN userprofile uup ON uup.empno = pn.updated_by
        $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$Records = $dbConn->findQuery($sql);
if($Records){
   foreach($Records as $row){
	$id = $row['position_name_id']; 
    $action =
            "
                <td>
                <button class='btn btn-primary btn-sm' id = 'btnUpdatePositionName' name ='btnUpdatePositionName' onclick ='btnUpdatePositionName(this.value)' value = '$id'  title='View' >
                    Update
                </button>
                </td>
            "; 
   $data[] = array(
      "Action" => $action,
      "position_name" => $row['position_name'],
      "position_initial" => $row['position_initial'],
      "added_by" => $row['added_by'],
      "datetime_added" => $row['datetime_added'],
      "updated_by" => $row['updated_by'],
      "datetime_updated" => $row['datetime_updated']);
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