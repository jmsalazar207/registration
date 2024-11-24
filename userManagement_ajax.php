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
            ac.account_status_name LIKE '%".$searchValue."%' OR
            pn.position_name LIKE '%".$searchValue."%' OR
            d.division_name LIKE '%".$searchValue."%' OR
            os.station_name LIKE '%".$searchValue."%' OR
            un.unit_name LIKE '%".$searchValue."%' )";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount FROM userprofile");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount
                                    FROM userprofile u
                                    LEFT JOIN lib_position pos ON pos.position_id = u.position_id
                                    LEFT JOIN lib_position_name pn ON pos.position_name_id = pn.position_name_id
                                    LEFT JOIN lib_unit un ON un.unit_code = pos.unit_code
                                    LEFT JOIN lib_division d ON un.division_code = d.division_code
                                    LEFT JOIN lib_official_station os ON un.station_code = os.station_code
                                    JOIN lib_account_status ac ON u.account_status = ac.account_status_code"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT u.empno, u.sname, u.fname, u.mname, u.ename, u.position_id, pos.item_code, pn.position_name, d.division_name, 
            un.unit_name, u.account_status ,os.station_name, ac.account_status_name
            FROM userprofile u
            LEFT JOIN lib_position pos ON pos.position_id = u.position_id
            LEFT JOIN lib_position_name pn ON pos.position_name_id = pn.position_name_id
            LEFT JOIN lib_unit un ON un.unit_code = pos.unit_code
            LEFT JOIN lib_division d ON un.division_code = d.division_code
            LEFT JOIN lib_official_station os ON un.station_code = os.station_code
            JOIN lib_account_status ac ON u.account_status = ac.account_status_code  
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$empno = $row['empno']; 
   $url = "adminDeleteUser.php";
   $acc_status = $row['account_status'];
   if($acc_status ==1 || $acc_status ==3){
      $action = "<td>
                  <button class='btn btn-primary btn-sm' id = 'btnAdminUpdate' name ='btnAdminUpdate'  value = '$empno'  title='View' >
                     Update
                  </button>
                  <button class='btn btn-warning btn-sm' id='btnAdminReview' name= 'btnAdminReview' value = '$empno'  title='Review' >
                  Review
                  </button>
                  <button class = 'btn btn-default btn-sm' type = 'button' id = 'btnResetPassword' name = 'btnResetPassword'  class = '' value = '$empno'  title='Reset Password'>
                     Reset
                  </button>
               </td>
               "; 
   
   }else if($acc_status == 2){
      $action = "<td>
                  <button class='btn btn-primary btn-sm' id = 'btnAdminUpdate' name ='btnAdminUpdate'  value = '$empno'  title='View' >
                     Update
                  </button>
                  <button class='btn btn-danger btn-sm' id='btnAdminLock' name= 'btnAdminLock' value = '$empno'  title='View' >
                  Lock Account
                  </button>
                  <button class = 'btn btn-default btn-sm' type = 'button' id = 'btnResetPassword' name = 'btnResetPassword' class = '' value = '$empno'  title='Reset Password'>
                     Reset
                  </button>
               </td>";
   }else if($acc_status == 4){
      $action = "<td>
                  <button class='btn btn-info btn-sm' id = 'btnAdminUpdate' name ='btnAdminUpdate'  value = '$empno'  title='View' >
                     Update
                  </button>
                  <button class='btn btn-warning btn-sm' id='btnAdminUnlock' name= 'btnAdminUnlock' value = '$empno'  title='View' >
                  Unlock Account
                  </button>
                  <button class = 'btn btn-default btn-sm' type = 'button' id = 'btnResetPassword' name = 'btnResetPassword'  class = '' value = '$empno'  title='Reset Password'>
                     Reset
                  </button>
                </td>";
   }else{
      $action =   "<td>
                     <button class='btn btn-primary btn-sm' id = 'btnAdminUpdate' name ='btnAdminUpdate'  value = '$empno'  title='View' >
                        Update
                     </button>
                  </td>
            <td>
               <button class='btn btn-danger btn-sm' id = 'btnDelete' name ='btnDelete' data-valueEmp = '$empno' data-valueURL = '$url'  title='Remove Information' >
                  Remove
               </button>
            </td>

                  ";
   }
     
   
   $data[] = array(
      "Action" => $action,
      "empno" => $empno,
      "sname" => $row['sname'],
      "fname" => $row['fname'],
      "mname" => $row['mname'],
      "ename" => $row['ename'],
      "item_code" => $row['item_code'],
      "position_name" => $row['position_name'],
      "division_name" => $row['division_name'],
      "unit_name" => $row['unit_name'],
      "station_name" => $row['station_name'],
      "account_status_name" => $row['account_status_name']);
      
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