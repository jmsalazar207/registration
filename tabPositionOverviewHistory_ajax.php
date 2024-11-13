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
// $History_Item_Code = $_POST['HistoryItemCode'];
$ItemCodeHistory = $_GET['item_code'];
$searchQuery = " WHERE ph.item_code = '$ItemCodeHistory'";
if($searchValue != ''){
   $searchQuery .= "AND (ph.empno LIKE '%".$searchValue."%' OR
                    ph.item_code LIKE '%".$searchValue."%' OR
                    pn.position_name LIKE '%".$searchValue."%' OR
                    up.fname LIKE '%".$searchValue."%' OR
                    up.mname LIKE '%".$searchValue."%' OR
                    up.sname LIKE '%".$searchValue."%' OR
                    up.ename LIKE '%".$searchValue."%' OR
                    ph.start_of_appointment LIKE '%".$searchValue."%' OR
                    ph.end_of_appointment LIKE '%".$searchValue."%' OR
                    ms.mode_seperation_description LIKE '%".$searchValue."%')";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(ph.item_code) as allcount 
FROM tbl_employee_appointment_history ph
LEFT JOIN userprofile up ON up.empno = ph.empno
LEFT JOIN lib_position pos ON pos.item_code = ph.item_code
LEFT JOIN lib_position_name pn ON pos.position_name_id = pn.position_name_id
LEFT JOIN lib_mode_seperation ms ON ms.mode_seperation_id = ph.reason_for_end_of_appointment");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(ph.item_code) as allcount 
                                    FROM tbl_employee_appointment_history ph
LEFT JOIN userprofile up ON up.empno = ph.empno
LEFT JOIN lib_position pos ON pos.item_code = ph.item_code
LEFT JOIN lib_position_name pn ON pos.position_name_id = pn.position_name_id
LEFT JOIN lib_mode_seperation ms ON ms.mode_seperation_id = ph.reason_for_end_of_appointment"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT ph.employee_assignment_id, ph.item_code, pn.position_name, CONCAT(up.fname,' ',up.mname,' ',up.sname,' ',up.ename) AS name, 
ph.start_of_appointment,ph.end_of_appointment, ms.mode_seperation_description
FROM tbl_employee_appointment_history ph
LEFT JOIN userprofile up ON up.empno = ph.empno
LEFT JOIN lib_position pos ON pos.item_code = ph.item_code
LEFT JOIN lib_position_name pn ON pos.position_name_id = pn.position_name_id
LEFT JOIN lib_mode_seperation ms ON ms.mode_seperation_id = ph.reason_for_end_of_appointment
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$id = $row['employee_assignment_id'];
    

   $action = "
            <td>
               <button class='' id = 'btnUpdateHistory' name ='btnUpdateHistory' onclick ='btnUpdateHistory(this.value)' value = '$id'  title='View' >
                  View Info
               </button>
            </td>
            "; 
   
   $data[] = array(
      // "Action" => $action,
      "item_code" => $row['item_code'],
      "position_name" => $row['position_name'],
      "name" => $row['name'],
      "start_of_appointment" => $row['start_of_appointment'],
      "end_of_appointment" => $row['end_of_appointment'],
      "mode_seperation_description" => $row['mode_seperation_description']
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