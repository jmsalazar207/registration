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
$searchQuery = " WHERE e.eligibility_status != 4";
if($searchValue != ''){
   $searchQuery .= " AND (e.empno LIKE '%".$searchValue."%' OR
            le.elibility_title LIKE '%".$searchValue."%' OR
            e.eligibility_credentials LIKE '%".$searchValue."%' OR
            e.eligibility_rating LIKE '%".$searchValue."%' OR
            e.eligibility_exam_date LIKE '%".$searchValue."%' OR
            e.eligibility_exam_place LIKE '%".$searchValue."%' OR
            e.eligibility_license LIKE '%".$searchValue."%' OR
            e.eligibility_validity_date LIKE '%".$searchValue."%' OR
            e.eligibility_remarks LIKE '%".$searchValue."%' OR
            u.fname LIKE '%".$searchValue."%' OR
            u.mname LIKE '%".$searchValue."%' OR
            u.sname LIKE '%".$searchValue."%' OR
            u.ename LIKE '%".$searchValue."%'
            )";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(e.empno) as allcount FROM lib_academic e");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(e.empno) as allcount
                                    FROM lib_eligibility e
                                    JOIN userprofile u ON u.empno = e.empno
                                    LEFT JOIN lib_list_eligibility le ON e.eligibility_credentials = le.id"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT e.*,le.elibility_title,CONCAT(u.fname,' ',u.mname,' ',u.sname,' ',u.ename) AS fullname
            FROM lib_eligibility e
            JOIN userprofile u ON u.empno = e.empno
            LEFT JOIN lib_list_eligibility le ON e.eligibility_credentials = le.id
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";
$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$requestID = $row['id'];
    $eligibility_status = $row['eligibility_status'];
    if($eligibility_status ==0){
        $eligibility_status = "<span class='badge bg-light-blue'>PENDING FOR VERIFICATION</span>";
        $action = "
        <td>
            <button class='' id = 'btnVerifyEligibilityUpload' name ='btnVerifyEligibilityUpload' onclick ='btnVerifyEligibilityUpload(this.value)' value = '$requestID'  title='View' >
                View
            </button>
        </td>
        ";
    }else if($eligibility_status ==1){
        $eligibility_status = "<span class='badge bg-green'>VERIFIED</span>";
        $action ='REQUEST VERIFIED';
    }else if($eligibility_status ==2){
        $eligibility_status = "<span class='badge bg-red'>FOR COMPLIANCE</span>";
        $action ='FOR COMPLIANCE';
    }else{
        $eligibility_status = 'REQUESTED CHANGES';
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
      "elibility_title" => $row['elibility_title'],
      "eligibility_rating" => $row['eligibility_rating'],
      "eligibility_exam_date" => $row['eligibility_exam_date'],
      "eligibility_exam_place" => $row['eligibility_exam_place'],
      "eligibility_license" => $row['eligibility_license'],
      "eligibility_validity_date" => $row['eligibility_validity_date'],
      "eligibility_status" => $eligibility_status,
      "eligibility_remarks" => $row['eligibility_remarks'],
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