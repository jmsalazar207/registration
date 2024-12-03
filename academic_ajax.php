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
$searchQuery = " WHERE empno = '$session_empno' AND acad_status !=4 ";
if($searchValue != ''){
   $searchQuery .= "AND (empno LIKE '%".$searchValue."%' OR
               acad_level LIKE '%".$searchValue."%' OR
               acad_school LIKE '%".$searchValue."%' OR
               acad_degree LIKE '%".$searchValue."%' OR
               acad_from LIKE '%".$searchValue."%' OR
               acad_to LIKE '%".$searchValue."%' OR
               acad_highest_level LIKE '%".$searchValue."%' OR
               acad_year_graduated LIKE '%".$searchValue."%' OR
               acad_remarks LIKE '%".$searchValue."%' OR
               acad_honors LIKE '%".$searchValue."%')";
}
## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(a.empno) as allcount FROM lib_academic a");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(a.empno) as allcount FROM lib_academic a"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT a.id,a.acad_level,
	CASE
    	WHEN a.acad_level = 1 THEN ps.primary_school_title
        WHEN a.acad_level = 2 THEN ps.primary_school_title
        ELSE cs.college_school_title
    END AS acad_school,
    CASE
    	WHEN a.acad_level = 1 THEN 'PRIMARY EDUCATION'
        WHEN a.acad_level = 2 THEN 'SECONDARY EDUCATION'
    	WHEN a.acad_level = 3 THEN cc.college_course_title
        WHEN a.acad_level = 4 THEN tc.training_course_title
       	ELSE gs.graduate_study_title
        END AS acad_degree,
        CONCAT(a.acad_from,'-',a.acad_to) AS acad_period,
        a.acad_highest_level, a.acad_year_graduated, a.acad_honors, a.acad_status, a.acad_remarks,a.empno, a.acad_uploaded_mov
        FROM lib_academic a
        LEFT JOIN lib_primary_school ps ON a.acad_school = ps.id
        LEFT JOIN lib_secondary_school ss ON a.acad_school = ss.id
        LEFT JOIN lib_college_school cs ON a.acad_school = cs.id
        LEFT JOIN lib_college_course cc ON a.acad_degree = cc.id
        LEFT JOIN lib_graduate_studies gs ON a.acad_degree = gs.id
        LEFT JOIN lib_training_course tc ON a.acad_degree = tc.id
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$id = $row['id'];
    $url = "academicDelete.php";
    $uploadedAcadMOV = $row['acad_uploaded_mov'];
    $acad_level =$row['acad_level'];
    $acad_status = $row['acad_status'];
    if($acad_level ==1){
        $acad_level = 'ELEMENTARY';
    }
    if($acad_level ==2){
        $acad_level = 'SECONDARY';
    }
    if($acad_level ==3){
        $acad_level = 'COLLEGE';
    }
    if($acad_level ==4){
        $acad_level = 'VOCATIONAL / TRADE COURSE';
    }
    if($acad_level ==5){
        $acad_level = 'GRADUATE STUDIES';
    }
    if($acad_status ==0){
        $acad_status = "<span class='badge bg-light-blue'>PENDING FOR VERIFICATION</span>";
        $action = "
             <td>
                <button class='btn btn-primary btn-sm' id = 'btnUserAcadsUpdate' name ='btnUserAcadsUpdate' value = '$id'  title='View' >
                  Update
               </button>
             </td>
             <td>
               <button class='btn btn-danger btn-sm' id = 'btnUserAcadsDelete' name ='btnUserAcadsDelete' data-valueID = '$id' data-valueURL = '$url' title='Remove Information' >
                  Remove
               </button>
            </td>
             "; 
    }
    if($acad_status ==1){
        $acad_status = "<span class='badge bg-green'>VERIFIED</span>";
        $action ="
            <td>
                <button class='btn btn-info btn-sm' id = 'btnUserAcadViewUploaded' name ='btnUserAcadViewUploaded' value = '$uploadedAcadMOV'  title='View Uploaded' >
                  View
               </button>
             </td>
             <td>
               <button class='btn btn-danger btn-sm' id = 'btnUserAcadsDelete' name ='btnUserAcadsDelete' data-valueID = '$id' data-valueURL = '$url' title='Remove Information' >
                  Remove
               </button>
            </td>
             ";
    }
    if($acad_status ==2){
        $acad_status = "<span class='badge bg-red'>FOR COMPLIANCE</span>";
        $action = "
             <td>
                <button class='btn btn-primary btn-sm' id = 'btnUserAcadsUpdate' name ='btnUserAcadsUpdate' value = '$id'  title='View' >
                  Update
               </button>
             </td>
             <td>
               <button class='btn btn-danger btn-sm' id = 'btnUserAcadsDelete' name ='btnUserAcadsDelete' data-valueID = '$id' data-valueURL = '$url' title='Remove Information' >
                  Remove
               </button>
            </td>
             "; 
    }
    if($acad_status ==5){
        $acad_status = "<span class='badge bg-green'>GOOD</span>";
        $action = "
             <td>
                <button class='btn btn-primary btn-sm' id = 'btnUserAcadsUpdate' name ='btnUserAcadsUpdate' value = '$id'  title='View' >
                  Update
               </button>
             </td>
             <td>
               <button class='btn btn-danger btn-sm' id = 'btnUserAcadsDelete' name ='btnUserAcadsDelete' data-valueID = '$id' data-valueURL = '$url' title='Remove Information' >
                  Remove
               </button>
            </td>
             "; 
    }
   
   $data[] = array(
      "Action" => $action,
      "acad_level" => $acad_level,
      "acad_school" => $row['acad_school'],
      "acad_degree" => $row['acad_degree'],
      "acad_period" => $row['acad_period'],
      "acad_highest_level" => $row['acad_highest_level'],
      "acad_year_graduated" => $row['acad_year_graduated'],
      "acad_honors" => $row['acad_honors'],
      "acad_status" => $acad_status,
      "acad_remarks" => $row['acad_remarks']
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