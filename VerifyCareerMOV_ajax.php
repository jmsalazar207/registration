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

$EmpID = $_SESSION['userID'];
## Search 
$searchQuery = " WHERE c.career_status !=4 AND c.empno != '$EmpID'";
if($searchValue != ''){
   $searchQuery .= "AND (c.empno LIKE '%".$searchValue."%' OR
            c.career_date_from LIKE '%".$searchValue."%' OR
            c.career_date_to LIKE '%".$searchValue."%' OR
            c.career_position_title LIKE '%".$searchValue."%' OR
            c.career_organization LIKE '%".$searchValue."%' OR
            c.career_salary LIKE '%".$searchValue."%' OR
            c.career_compensention_level LIKE '%".$searchValue."%' OR
            c.career_status_appointment LIKE '%".$searchValue."%' OR
            u.fname LIKE '%".$searchValue."%' OR
            u.mname LIKE '%".$searchValue."%' OR
            u.sname LIKE '%".$searchValue."%' OR
            u.ename LIKE '%".$searchValue."%'
            )";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(c.empno) as allcount FROM lib_career c");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(c.empno) as allcount
                                    FROM lib_career c
                                    JOIN userprofile u ON u.empno = c.empno"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT c.*,CONCAT(c.career_date_from,'-',c.career_date_to) AS career_period, CONCAT(u.fname,' ',u.mname,' ',u.sname,' ',u.ename) AS fullname
            FROM lib_career c
            JOIN userprofile u ON u.empno = c.empno
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";
$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$requestID = $row['id'];
    $govtService = $row['career_govt_service'];
    if($govtService==1){
        $govtService = 'YES';
    }else{
        $govtService = 'NO';
    }
    $present = $row['career_present'];
    if($present=='on'){
      $period = $row['career_date_from'].' - '.'PRESENT';
    }else{
      $period = $row['career_date_from'].' - '.$row['career_date_to'];
    }
    $career_status = $row['career_status'];
    if($career_status ==0){
        $career_status = "<span class='badge bg-light-blue'>PENDING FOR VERIFICATION</span>";
        $action = "
        <td>
            <button class='btn btn-info btn-sm' id = 'btnVerifyCareerUpload' name ='btnVerifyCareerUpload' value = '$requestID'  title='View' >
                View
            </button>
        </td>
        ";
    }else if($career_status ==1){
        $career_status = "<span class='badge bg-green'>VERIFIED</span>";
        $action ='REQUEST VERIFIED';
    }else if($career_status ==2){
        $career_status = "<span class='badge bg-red'>FOR COMPLIANCE</span>";
        $action ='FOR COMPLIANCE';
    }else{
        $career_status = 'REQUESTED CHANGES';
        $action = "
        <td>
            <button class='' id = 'btnConfirmRequest' name ='btnConfirmRequest' onclick ='btnConfirmRequest(this.value)' value = '$requestID'  title='View' >
                Confirm Request
            </button>
        </td>
        ";
    }
  
   $data[] = array(
      "Action" => $action,
      "fullname" => $row['fullname'],
      "career_period" => $period,
      "career_position_title" => $row['career_position_title'],
      "career_organization" => $row['career_organization'],
      "career_salary" => $row['career_salary'],
      "career_compensention_level" => $row['career_compensention_level'],
      "career_status_appointment" => $row['career_status_appointment'],
      "GovernmentService" => $govtService,
      "career_status" => $career_status,
      "career_remarks" => $row['career_remarks']
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