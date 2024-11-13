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
$searchQuery = " WHERE e.empno = '$session_empno' AND e.eligibility_status !=4 ";
if($searchValue != ''){
   $searchQuery .= " AND(e.empno LIKE '%".$searchValue."%' OR
               et.elibility_title LIKE '%".$searchValue."%' OR
               e.eligibility_rating LIKE '%".$searchValue."%' OR
               e.eligibility_exam_date LIKE '%".$searchValue."%' OR
               e.eligibility_exam_place LIKE '%".$searchValue."%' OR
               e.eligibility_license LIKE '%".$searchValue."%' OR
               e.eligibility_validity_date LIKE '%".$searchValue."%')";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(e.empno) as allcount 
                                    FROM lib_eligibility e
                                    LEFT JOIN lib_list_eligibility et ON e.eligibility_credentials = et.id");
$totalRecords = $records['allcount'];
## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(e.empno) as allcount 
                                    FROM lib_eligibility e
                                    LEFT JOIN lib_list_eligibility et ON e.eligibility_credentials = et.id"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT e.*,et.elibility_title
            FROM lib_eligibility e
            LEFT JOIN lib_list_eligibility et ON e.eligibility_credentials = et.id
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
   $id = $row['id'];
   $url = "eligibilityDelete.php";
   $deleteValue = $id.','.$url;
   $eligibility_status = $row['eligibility_status'];
   $eligibility_uploaded_mov = $row['eligibility_uploaded_mov'];
   if($eligibility_status == 0){
      $eligibility_status = "<span class='badge bg-light-blue'>PENDING FOR VERIFICATION</span>";
   $action = "
      <td>
         <button class='btn btn-info btn sm' id = 'btnEligibilityUpdate' name ='btnEligibilityUpdate' onclick ='btnEligibilityUpdate(this.value)' value = '$id'  title='View' >
            View Info
         </button>
      </td>
      <td>
         <button class='btn btn-danger btn-sm' id = 'btnDelete' name ='btnDelete' onclick ='btnDelete(this.value)' value = '$deleteValue'  title='Remove Information' >
            Remove
         </button>
      </td>
      "; 
   }
   if($eligibility_status == 1){
      $eligibility_status = "<span class='badge bg-green'>VERIFIED</span>";
      $action = "
         <td>
            <button class='btn btn-info btn sm' id = 'btnEligibilityViewUploaded' name ='btnEligibilityViewUploaded' onclick ='btnEligibilityViewUploaded(this.value)' value = '$eligibility_uploaded_mov'  title='View' >
               View
            </button>
         </td>
         <td>
            <button class='btn btn-danger btn-sm' id = 'btnDelete' name ='btnDelete' onclick ='btnDelete(this.value)' value = '$deleteValue'  title='Remove Information' >
               Remove
            </button>
         </td>
         "; 
   }
   if($eligibility_status == 2){
      $eligibility_status = "<span class='badge bg-red'>FOR COMPLIANCE</span>";
   $action = "
      <td>
         <button class='btn btn-info btn sm' id = 'btnEligibilityUpdate' name ='btnEligibilityUpdate' onclick ='btnEligibilityUpdate(this.value)' value = '$id'  title='View' >
            View
         </button>
      </td>
      <td>
         <button class='btn btn-danger btn-sm' id = 'btnDelete' name ='btnDelete' onclick ='btnDelete(this.value)' value = '$deleteValue'  title='Remove Information' >
            Remove
         </button>
      </td>
      "; 
   }
   
   $data[] = array(
      "Action" => $action,
      "elibility_title" => $row['elibility_title'],
      "eligibility_rating" => $row['eligibility_rating'],
      "eligibility_exam_date" => $row['eligibility_exam_date'],
      "eligibility_exam_place" => $row['eligibility_exam_place'],
      "eligibility_license" => $row['eligibility_license'],
      "eligibility_validity_date" => $row['eligibility_validity_date'],
      "eligibility_status" => $eligibility_status,
      "eligibility_remarks" => $row['eligibility_remarks']
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