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
$searchQuery = " WHERE area_assignment_status != 3 ";
if($searchValue != ''){
   $searchQuery .= "AND (las.area_assignment_name LIKE '%".$searchValue."%' OR
            lol.office_location_name LIKE '%".$searchValue."%' OR
            u.unit_name LIKE '%".$searchValue."%' OR
            d.division_name LIKE '%".$searchValue."%' OR
            added.sname LIKE '%".$searchValue."%' OR
            added.fname LIKE '%".$searchValue."%' OR
            added.mname LIKE '%".$searchValue."%' OR
            las.datetime_added LIKE '%".$searchValue."%' OR
            las.datetime_updated LIKE '%".$searchValue."%' OR
            updated.sname LIKE '%".$searchValue."%' OR
            updated.fname LIKE '%".$searchValue."%' OR
            updated.mname LIKE '%".$searchValue."%')";
}

//  os.station_name LIKE '%".$searchValue."%' OR
## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(area_assignment_code) as allcount FROM lib_area_assignment");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(las.area_assignment_code) as allcount  
                                    FROM lib_area_assignment las
                                    JOIN lib_office_location lol ON lol.office_location_code = las.office_location_code
                                    JOIN lib_unit u ON u.unit_code = las.unit_code
                                    JOIN lib_division d ON d.division_code = u.division_code
                                    LEFT JOIN userprofile added ON added.empno = u.added_by
                                    LEFT JOIN userprofile updated ON updated.empno = u.updated_by"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql = "SELECT las.area_assignment_code, las.area_assignment_name, lol.office_location_name, u.unit_name,d.division_name,
CONCAT(added.fname,' ',added.mname,' ',added.sname) AS added_by_name, las.datetime_added,
CONCAT(updated.fname,' ',updated.mname,' ',updated.sname) AS updated_by_name,
las.datetime_updated, las.area_assignment_status
FROM lib_area_assignment las
JOIN lib_office_location lol ON lol.office_location_code = las.office_location_code
JOIN lib_unit u ON u.unit_code = las.unit_code
JOIN lib_division d ON d.division_code = u.division_code
LEFT JOIN userprofile added ON added.empno = las.added_by
LEFT JOIN userprofile updated ON updated.empno = las.updated_by
         $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$AreaAssignmentRecords = $dbConn->findQuery($sql);
if($AreaAssignmentRecords){
   foreach($AreaAssignmentRecords as $row){
	$AreaAssignmentCode = $row['area_assignment_code'];
   $url = 'adminDeleteAreaAssignment.php';
    $action = "<td>
                  <button class='btn btn-primary btn-sm' id='btnAdminAreaAssignUpdate' name='btnAdminAreaAssignUpdate' value = '$AreaAssignmentCode'  title='View' >
                     Update
                  </button>
                  <button class='btn btn-danger btn-sm' id='btnAdminAreaAssignDelete' name='btnAdminAreaAssignDelete' data-valueID = '$AreaAssignmentCode' data-valueURL = '$url'  title='Remove' >
                     Remove
                  </button>
               </td>";  
   
   $data[] = array(
      "Action" => $action,
      "area_assignment_name" => $row["area_assignment_name"],
      "office_location_name" => $row["office_location_name"],
      "unit_name"=> $row["unit_name"],
      "division_name"=> $row["division_name"],
      "added_by_name"=> $row["added_by_name"],
      "datetime_added"=> $row["datetime_added"],
      "updated_by_name"=> $row["updated_by_name"],
      "datetime_updated"=> $row["datetime_updated"]
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