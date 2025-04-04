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

$AcadLevelMap = [
    'ELEMENTARY EDUCATION' => 1,
    'SECONDARY EDUCATION' => 2,
    'TERTIARY EDUCATION' => 3,
    'VOCATIONAL / TRADE CORSE' => 4,
    'GRADUATE STUDIES' => 5,
 ];

$EmpID = $_SESSION['userID'];
## Search 
 $searchQuery = " WHERE a.acad_status != 5 AND a.acad_status != 4 AND a.empno != '$EmpID'";
     // Map the search value to a training type if applicable
    $AcadLevelCondition = '';
    $mappedAcadLevel = array_search(strtoupper($searchValue), array_keys($AcadLevelMap));
    if ($mappedAcadLevel !== false) {
        $AcadLevelCondition = " OR acad_level = " . $AcadLevelMap[array_keys($AcadLevelMap)[$mappedAcadLevel]];
    }

if($searchValue != ''){
   $searchQuery .= " AND (a.empno LIKE '%".$searchValue."%' OR
            cs.college_school_title LIKE '%".$searchValue."%' OR
            cc.college_course_title LIKE '%".$searchValue."%' OR
            a.acad_school LIKE '%".$searchValue."%' OR
            a.acad_degree LIKE '%".$searchValue."%' OR
            a.acad_from LIKE '%".$searchValue."%' OR
            a.acad_to LIKE '%".$searchValue."%' OR
            a.acad_highest_level LIKE '%".$searchValue."%' OR
            a.acad_year_graduated LIKE '%".$searchValue."%' OR
            a.acad_honors LIKE '%".$searchValue."%' OR
            a.acad_status LIKE '%".$searchValue."%' OR
            a.acad_remarks LIKE '%".$searchValue."%' OR
            u.fname LIKE '%".$searchValue."%' OR
            u.mname LIKE '%".$searchValue."%' OR
            u.sname LIKE '%".$searchValue."%' OR
            u.ename LIKE '%".$searchValue."%'
            $AcadLevelCondition)";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(a.empno) as allcount FROM lib_academic a");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(a.empno) as allcount
                                    FROM lib_academic a
                                    JOIN userprofile u ON u.empno = a.empno
                                    LEFT JOIN lib_college_school cs on a.acad_school = cs.id
                                    LEFT JOIN lib_college_course cc on a.acad_degree = cc.id"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT a.empno, a.id,a.acad_level,cs.college_school_title,cc.college_course_title, a.acad_highest_level, 
            a.acad_year_graduated, a.acad_honors, a.acad_status, a.acad_remarks, a.acad_from, a.acad_to,
            CONCAT(a.acad_from,'-',a.acad_to) AS acad_period, 
            CONCAT(u.fname,' ',u.mname,' ',u.sname,' ',u.ename) AS fullname
            FROM lib_academic a
            JOIN userprofile u ON u.empno = a.empno
            LEFT JOIN lib_college_school cs on a.acad_school = cs.id
            LEFT JOIN lib_college_course cc on a.acad_degree = cc.id
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";
$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$requestID = $row['id'];
    $acad_level = $row['acad_level'];
    if($acad_level == 1){
        $acad_level = 'ELEMENTARY EDUCATION';
    }else if($acad_level == 2){
        $acad_level = 'SECONDARY EDUCATION';
    }else if($acad_level == 3){
        $acad_level = 'TERTIARY EDUCATION';
    }else if($acad_level == 4){
        $acad_level = 'VOCATIONAL / TRADE CORSE';
    }else{
        $acad_level = 'GRADUATE STUDIES';
    }
    $acad_status = $row['acad_status'];
    if($acad_status ==0){
        $acad_status = "<span class='badge bg-light-blue'>PENDING FOR VERIFICATION</span>";
        $action = "
        <td>
            <button class='btn btn-info btn-sm' id = 'btnVerifyUpload' name ='btnVerifyUpload' value = '$requestID'  title='View' >
                View
            </button>
        </td>
        ";
    }else if($acad_status ==1){
        $acad_status = "<span class='badge bg-green'>VERIFIED</span>";
        $action ='REQUEST VERIFIED';
    }else if($acad_status ==2){
        $acad_status = "<span class='badge bg-red'>FOR COMPLIANCE</span>";
        $action ='FOR COMPLIANCE';
    }else{
        $acad_status = 'REQUESTED CHANGES';
        $action = "
        <td>
            <button class='' id = 'btnConfirmRequest' name ='btnConfirmRequest' value = '$requestID'  title='View' >
                Confirm Request
            </button>
        </td>
        ";
    }
  
   $data[] = array(
      "Action" => $action,
      "fullname" => $row['fullname'],
      "acad_level" => $acad_level,
      "college_school_title" => $row['college_school_title'],
      "college_course_title" => $row['college_course_title'],
      "acad_period" => $row['acad_from'].'-'.$row['acad_to'],
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