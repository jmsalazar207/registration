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
$searchQuery = " WHERE unit_status != 3 ";
if($searchValue != ''){
   $searchQuery .= "AND (u.unit_name LIKE '%".$searchValue."%' OR
            u.unit_name_code LIKE '%".$searchValue."%' OR
            added.sname LIKE '%".$searchValue."%' OR
            added.fname LIKE '%".$searchValue."%' OR
            added.mname LIKE '%".$searchValue."%' OR
            u.datetime_added LIKE '%".$searchValue."%' OR
            u.datetime_updated LIKE '%".$searchValue."%' OR
            updated.sname LIKE '%".$searchValue."%' OR
            updated.fname LIKE '%".$searchValue."%' OR
            updated.mname LIKE '%".$searchValue."%' OR
            d.division_name LIKE '%".$searchValue."%')";
}

//  os.station_name LIKE '%".$searchValue."%' OR
## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(unit_code) as allcount FROM lib_unit");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(u.unit_code) as allcount  
                                    FROM lib_unit u
                                    JOIN lib_division d ON d.division_code = u.division_code
                                    -- JOIN lib_official_station os ON os.station_code = u.station_code  
                                    LEFT JOIN userprofile added ON added.empno = u.added_by
                                    LEFT JOIN userprofile updated ON updated.empno = u.updated_by"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql = "SELECT u.unit_code, u.unit_name, u.unit_name_code, d.division_name, u.datetime_added, u.datetime_updated,
         CONCAT(added.fname,' ',added.mname,' ',added.sname) AS added_by,
         CONCAT(updated.fname,' ',updated.mname,' ',updated.sname) AS updated_by
         FROM lib_unit u
         JOIN lib_division d ON d.division_code = u.division_code
         -- JOIN lib_official_station os ON os.station_code = u.station_code  
         LEFT JOIN userprofile added ON added.empno = u.added_by
         LEFT JOIN userprofile updated ON updated.empno = u.updated_by
         $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$unitRecords = $dbConn->findQuery($sql);
if($unitRecords){
   foreach($unitRecords as $row){
	$unitCode = $row['unit_code'];
   $url = 'adminDeleteUnit.php';
    $action = "<td>
                  <button class='btn btn-primary btn-sm' id='btnAdminUnitUpdate' name='btnAdminUnitUpdate' value = '$unitCode'  title='View' >
                     Update
                  </button>
               </td>
               <td>
                  <button class='btn btn-danger btn-sm' id='btnAdminUnitDelete' name='btnAdminUnitDelete' data-valueID = '$unitCode' data-valueURL = '$url'  title='Remove' >
                     Remove
                  </button>
               </td>";  
   
   $data[] = array(
      "Action" => $action,
      "unit_name" => $row["unit_name"],
      "unit_name_code"=> $row["unit_name_code"],
      "division_name"=> $row["division_name"],
      // "station_name"=> $row["station_name"],
      "added_by"=> $row["added_by"],
      "datetime_added"=> $row["datetime_added"],
      "updated_by"=> $row["updated_by"],
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