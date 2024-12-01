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
$session_empno = $_SESSION['userID'];
$searchQuery = " WHERE empno = '$session_empno' AND career_status !=4 ";
if($searchValue != ''){
   $searchQuery .= "AND (empno LIKE '%".$searchValue."%' OR
                    career_date_from LIKE '%".$searchValue."%' OR
                    career_date_from LIKE '%".$searchValue."%' OR
                    career_position_title LIKE '%".$searchValue."%' OR
                    career_organization LIKE '%".$searchValue."%' OR
                    career_salary LIKE '%".$searchValue."%' OR
                    career_compensention_level LIKE '%".$searchValue."%' OR
                    career_status_appointment LIKE '%".$searchValue."%')";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(id) as allcount FROM lib_career");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(id) as allcount FROM lib_career"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT *, concat(career_date_from,' ','to',' ',career_date_to) as period 
            FROM lib_career
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$id = $row['id'];
   $url = "careerDelete.php";
    $deleteValue = $id.','.$url;
   $uploadedCareerMOV = $row['career_uploaded_mov'];
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
               <button class='btn btn-info btn-sm' id = 'btnUserCareerUpdate' name ='btnUserCareerUpdate' value = '$id'  title='View' >
                  Update
               </button>
            </td>
            <td>
               <button class='btn btn-danger btn-sm' id = 'btnUserCareerDelete' name ='btnUserCareerDelete' data-valueID = '$id' data-valueURL = '$url'  title='Remove Information' >
                  Remove
               </button>
            </td>
            ";  
  }
  if($career_status ==1){
   $career_status = "<span class='badge bg-green'>VERIFIED</span>";
   $action ="
       <td>
           <button class='btn btn-info btn-sm' id = 'btnUserCareerViewUploaded' name ='btnUserCareerViewUploaded' value = '$uploadedCareerMOV'  title='View Uploaded' >
             View
          </button>
        </td>
        <td>
               <button class='btn btn-danger btn-sm' id = 'btnUserCareerDelete' name ='btnUserCareerDelete' data-valueID = '$id' data-valueURL = '$url'  title='Remove Information' >
                  Remove
               </button>
            </td>
        ";
}
if($career_status ==2){
   $career_status = "<span class='badge bg-red'>FOR COMPLIANCE</span>";
   $action = "
            <td>
               <button class='btn btn-info btn-sm' id = 'btnUserCareerUpdate' name ='btnUserCareerUpdate' value = '$id'  title='View' >
                  Update
               </button>
            </td>
            <td>
               <button class='btn btn-danger btn-sm' id = 'btnUserCareerDelete' name ='btnUserCareerDelete' data-valueID = '$id' data-valueURL = '$url'  title='Remove Information' >
                  Remove
               </button>
            </td>
            ";  
}
   $data[] = array(
      "Action" => $action,
      "period" => $period,
      "career_position_title" => $row['career_position_title'],
      "career_organization" => $row['career_organization'],
      "career_salary" => $row['career_salary'],
      "career_compensention_level" => $row['career_compensention_level'],
      "career_status_appointment" => $row['career_status_appointment'],
      "career_govt_service" => $govtService,
      "career_status" => $career_status,
      "career_remarks" => $row['career_remarks'],
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