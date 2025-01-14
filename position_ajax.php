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
$searchQuery = " WHERE pos.position_status <3 ";
if($searchValue != ''){
   $searchQuery .= "AND (
            pos.item_code LIKE '%".$searchValue."%' OR
            pn.position_name LIKE '%".$searchValue."%' OR
            pos.position_id LIKE '%".$searchValue."%' OR
            cs.classification_employment_name LIKE '%".$searchValue."%' OR
            pstat.position_status_description LIKE '%".$searchValue."%' OR
            fs.fund_source_name LIKE '%".$searchValue."%' OR
            pos.date_creation_position LIKE '%".$searchValue."%' OR
            d.division_name LIKE '%".$searchValue."%' OR
            u.unit_name LIKE '%".$searchValue."%' OR
            las.area_assignment_name LIKE '%".$searchValue."%' )";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(position_id) as allcount FROM lib_position");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(pos.position_id) as allcount 
                                   FROM lib_position pos
JOIN lib_position_name pn ON pn.position_name_id = pos.position_name_id
JOIN lib_classification_employment cs ON cs.position_classification_id = pos.position_classification_id
JOIN lib_fund_source fs ON fs.fund_source_code = pos.fund_source_code
JOIN lib_area_assignment las ON las.area_assignment_code = pos.area_assignment
JOIN lib_unit u ON las.unit_code = u.unit_code
JOIN lib_division d ON u.division_code = d.division_code
JOIN lib_position_status pstat ON pstat.position_status = pos.position_status"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql = "SELECT pos.position_id, pos.item_code, pn.position_name, cs.classification_employment_name, 
fs.fund_source_name, pos.date_creation_position, pos.salary_history_id, d.division_name, 
u.unit_name, las.area_assignment_name, pstat.position_status, pstat.position_status_description
FROM lib_position pos
JOIN lib_position_name pn ON pn.position_name_id = pos.position_name_id
JOIN lib_classification_employment cs ON cs.position_classification_id = pos.position_classification_id
JOIN lib_fund_source fs ON fs.fund_source_code = pos.fund_source_code
JOIN lib_area_assignment las ON las.area_assignment_code = pos.area_assignment
JOIN lib_unit u ON las.unit_code = u.unit_code
JOIN lib_division d ON u.division_code = d.division_code
JOIN lib_position_status pstat ON pstat.position_status = pos.position_status
        $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$Records = $dbConn->findQuery($sql);
if($Records){
   foreach($Records as $row){
	$id = $row['position_id']; 
   $sql_filled_by = "SELECT CONCAT(u.fname,' ',u.mname,' ',u.sname,' ',u.ename) AS filled_by, u.date_filled
                     FROM userprofile u
                     WHERE u.position_id = '$id' AND u.emp_status =0";
   $output_filled_by = $dbConn->findFirstQuery($sql_filled_by);
   $filled_by = $output_filled_by['filled_by']= isset($output_filled_by['filled_by']) ? $output_filled_by['filled_by']: '';
   $date_filled = $output_filled_by['date_filled'] = isset($output_filled_by['date_filled'])? $output_filled_by['date_filled']:''; 
    $action =
            "
               <td>
                  <button class='btn btn-primary btn-sm' id = 'btnPositionHistory' name ='btnPositionHistory' value = '$id'  title='Update' >
                     Update
                  </button>
               </td>
            "; 
   $data[] = array(
      "Action" => $action,
      "item_code" => $row['item_code'],
      "position_name" => $row['position_name'],
      "position_status_description" => $row['position_status_description'],
      "classification_employment_name" => $row['classification_employment_name'],
      "fund_source_name" => $row['fund_source_name'],
      "date_creation_position" => $row['date_creation_position'],
      "salary_history_id" => $row['salary_history_id'],
      "division_name" => $row['division_name'],
      "unit_name" => $row['unit_name'],
      "area_assignment_name" => $row['area_assignment_name'],
      "filled_by" => $filled_by,
      "date_filled" => $date_filled
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