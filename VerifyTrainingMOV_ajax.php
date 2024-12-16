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
$searchQuery = " WHERE t.training_status != 4 ";
if($searchValue != ''){
   $searchQuery .= "AND (t.empno LIKE '%".$searchValue."%' OR
            t.training_title LIKE '%".$searchValue."%' OR
            t.training_date_from LIKE '%".$searchValue."%' OR
            t.training_date_to LIKE '%".$searchValue."%' OR
            t.training_hours LIKE '%".$searchValue."%' OR
            t.training_type LIKE '%".$searchValue."%' OR
            t.training_conducted_by LIKE '%".$searchValue."%' OR
            u.fname LIKE '%".$searchValue."%' OR
            u.mname LIKE '%".$searchValue."%' OR
            u.sname LIKE '%".$searchValue."%' OR
            u.ename LIKE '%".$searchValue."%')";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(t.empno) as allcount FROM lib_training t");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(t.empno) as allcount
                                    FROM lib_training t
                                    JOIN userprofile u ON u.empno = t.empno"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT t.*,CONCAT(t.training_date_from,'-',t.training_date_to) AS training_period,CONCAT(u.fname,' ',u.mname,' ',u.sname,' ',u.ename) AS fullname
            FROM lib_training t
            JOIN userprofile u ON u.empno = t.empno
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";
$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$requestID = $row['id'];
    $training_status = $row['training_status'];
    $training_type = $row['training_type'];
    if($training_type==1){
        $training_type = 'MANAGERIAL';
    }
    if($training_type==2){
        $training_type = 'SUPERVISORY';
    }
    if($training_type==3){
        $training_type = 'TECHNICAL';
    }
    if($training_status ==0){
        $training_status = "<span class='badge bg-light-blue'>PENDING FOR VERIFICATION</span>";
        $action = "
        <td>
            <button class='' id = 'btnVerifyTrainingUpload' name ='btnVerifyTrainingUpload' onclick ='btnVerifyTrainingUpload(this.value)' value = '$requestID'  title='View' >
                View
            </button>
        </td>
        ";
    }else if($training_status ==1){
        $training_status = "<span class='badge bg-green'>VERIFIED</span>";
        $action ='REQUEST VERIFIED';
    }else if($training_status ==2){
        $training_status = "<span class='badge bg-red'>FOR COMPLIANCE</span>";
        $action ='FOR COMPLIANCE';
    }else{
        $training_status = 'REQUESTED CHANGES';
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
      "training_period" => $row['training_period'],
      "training_title" => $row['training_title'],
      "training_hours" => $row['training_hours'],
      "training_type" => $training_type,
      "training_conducted_by" => $row['training_conducted_by'],
      "training_status" => $training_status,
      "training_remarks" => $row['training_remarks']
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