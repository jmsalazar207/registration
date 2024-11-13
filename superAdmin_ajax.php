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
            b.brgy_name LIKE '%".$searchValue."%' OR
            c.city_name LIKE '%".$searchValue."%' OR
            prov.prov_name LIKE '%".$searchValue."%' OR
            r.region_name LIKE '%".$searchValue."%' OR
            las.account_status_name LIKE '%".$searchValue."%' OR
            ul.description LIKE '%".$searchValue."%' OR
            pn.position_name LIKE '%".$searchValue."%' OR
            d.division_name LIKE '%".$searchValue."%' OR
            un.unit_name LIKE '%".$searchValue."%' )";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount FROM userprofile");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount  
FROM userprofile u
LEFT JOIN lib_position p ON p.position_id = u.position_id
LEFT JOIN lib_unit un ON un.unit_code = p.unit_code
LEFT JOIN lib_division d ON d.division_code = un.division_code
LEFT JOIN lib_position_name pn ON pn.position_name_id = p.position_name_id
LEFT JOIN lib_regions r ON r.region_code = u.region
LEFT JOIN lib_provinces prov ON prov.prov_code = u.province
LEFT JOIN lib_cities c ON c.city_code = u.city
LEFT JOIN lib_brgy b ON b.brgy_code = u.barangay 
JOIN lib_account_status las ON las.account_status_code = u.account_status
JOIN lib_user_level ul ON ul.user_code = u.user_level".$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT u.empno, CONCAT(u.sname,' ',u.fname,' ', u.mname,' ', u.ename) AS fullname,
CONCAT(u.numAdd,' ',u.street,' ',b.brgy_name,' ',c.city_name,' ',prov.prov_name,' ',r.region_name) AS address,
pn.position_name, d.division_name, un.unit_name, u.date_registered, u.account_status, las.account_status_name, ul.description
FROM userprofile u
LEFT JOIN lib_position p ON p.position_id = u.position_id
LEFT JOIN lib_unit un ON un.unit_code = p.unit_code
LEFT JOIN lib_division d ON d.division_code = un.division_code
LEFT JOIN lib_position_name pn ON pn.position_name_id = p.position_name_id
LEFT JOIN lib_regions r ON r.region_code = u.region
LEFT JOIN lib_provinces prov ON prov.prov_code = u.province
LEFT JOIN lib_cities c ON c.city_code = u.city
LEFT JOIN lib_brgy b ON b.brgy_code = u.barangay 
JOIN lib_account_status las ON las.account_status_code = u.account_status
JOIN lib_user_level ul ON ul.user_code = u.user_level
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";
$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$empno = $row['empno'];
   $acc_status = $row['account_status'];
   if($acc_status>0)
   {
      $action = 
      "
      <td style='text-align:center'>
         <button type = 'button' id = 'btnResetPassword' name = 'btnResetPassword' onclick ='resetPassword(this.value)' class = 'btn btn-primary' value = '$empno'  title='Reset Password'>
            Reset
         </button>
      </td>
      <td style='text-align:center'>
         <button type = 'button' id = 'btnSetUL' name = 'btnSetUL' onclick ='setUserlevel(this.value)' class = 'btn btn-primary' value = '$empno'  title='Set User Level'>
            Set User Level 
         </button>
      </td>
      ";  
   }else{
      $action = 
      "
      <td style='text-align:center'>
      <button type = 'button' id = 'btnViewInfo' name = 'btnViewInfo' class = 'btn btn-primary' value = '$empno'  title='Reset Password'>
         View
      </button>
   </td>
   ";
   }

   
   $data[] = array(
      "Action" => $action,
      "empno" => $empno,
      "fullname" => $row['fullname'],
      "address" => $row['address'],
      "position" => $row['position_name'],
      "division" => $row['division_name'],
      "unit" => $row['unit_name'],
      "date_registered" => $row['date_registered'],
      "account_status_name" => $row['account_status_name'],
      "description" => $row['description']
   
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