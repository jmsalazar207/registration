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
            u.date_registered LIKE '%".$searchValue."%' OR
            ac.account_status_name LIKE '%".$searchValue."%' OR
            pn.position_name LIKE '%".$searchValue."%' OR
            d.division_name LIKE '%".$searchValue."%' OR
            las.area_assignment_name LIKE '%".$searchValue."%' OR
            pos.item_code LIKE '%".$searchValue."%' OR
            es.status_description LIKE '%".$searchValue."%' OR
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
                                    LEFT JOIN lib_area_assignment las ON las.area_assignment_code = pos.area_assignment 
                                    LEFT JOIN lib_unit un ON un.unit_code = las.unit_code
                                    LEFT JOIN lib_division d ON un.division_code = d.division_code             
                                    JOIN lib_account_status ac ON u.account_status = ac.account_status_code
                                    JOIN lib_emp_status es ON es.emp_status_id = u.emp_status"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT u.empno, u.sname, u.fname, u.mname, u.ename, u.position_id,u.date_registered, u.emp_status, pos.item_code, pn.position_name, d.division_name, un.unit_name, u.account_status ,las.area_assignment_name, ac.account_status_name,es.status_description
            FROM userprofile u 
            LEFT JOIN lib_position pos ON pos.position_id = u.position_id 
            LEFT JOIN lib_position_name pn ON pos.position_name_id = pn.position_name_id 
            LEFT JOIN lib_area_assignment las ON las.area_assignment_code = pos.area_assignment 
            LEFT JOIN lib_unit un ON un.unit_code = las.unit_code
            LEFT JOIN lib_division d ON un.division_code = d.division_code             
            JOIN lib_account_status ac ON u.account_status = ac.account_status_code
            JOIN lib_emp_status es ON es.emp_status_id = u.emp_status
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$empno = $row['empno']; 
   $url = "adminDeleteUser.php";
   $acc_status = $row['account_status'];
   $emp_status = $row['emp_status'];
   if($emp_status !=0){ //Not Active
      // <td>
      //             <button class='btn btn-primary btn-sm' id = 'btnAdminReactivate' name ='btnAdminReactivate'  value = '$empno'  title='Reactivate' >
      //                Reactivate
      //             </button>
      $action = "
                   <button class='btn btn-info btn-sm' id = 'btnAdminReengage' name ='btnAdminReengage'  value = '$empno'  title='Re-Engage' >
                     Re-Engage
                  </button>
               </td>
               "; 
   }else{
      if($acc_status ==1 || $acc_status ==3){ //Pending registration and disapproved
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
                     <button class = 'btn btn-warning btn-sm' type = 'button' id = 'btnInactive' name = 'btnInactive'  class = '' value = '$empno'  title='Inactive'>
                        Inactive
                     </button>
                  </td>
                  "; 
      
      }else if($acc_status == 2){ //Approved
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
                     <button class = 'btn btn-warning btn-sm' type = 'button' id = 'btnInactive' name = 'btnInactive'  class = '' value = '$empno'  title='Inactive'>
                        Inactive
                     </button>
                  </td>";
      }else if($acc_status == 4){ //acount locked
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
                     <button class = 'btn btn-warning btn-sm' type = 'button' id = 'btnInactive' name = 'btnInactive'  class = '' value = '$empno'  title='Inactive'>
                        Inactive
                     </button>
                   </td>";
      }else{ //unregistered
         $action =   "<td>
                        <button class='btn btn-primary btn-sm' id = 'btnAdminUpdate' name ='btnAdminUpdate'  value = '$empno'  title='View' >
                           Update
                        </button>
                     </td>
               <td>
                  <button class='btn btn-danger btn-sm' id = 'btnAdminDelete' name ='btnAdminDelete' data-valueID = '$empno' data-valueURL = '$url'  title='Remove Information' >
                     Remove
                  </button>
                  <button class = 'btn btn-warning btn-sm' type = 'button' id = 'btnInactive' name = 'btnInactive'  class = '' value = '$empno'  title='Inactive'>
                        Inactive
                     </button>
               </td>
   
                     ";
      }
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
      "area_assignment_name" => $row['area_assignment_name'],
      "date_registered" => $row['date_registered'],
      "account_status_name" => $row['account_status_name'],
      "status_description" => $row['status_description']);
      
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