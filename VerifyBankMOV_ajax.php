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
$searchQuery = " WHERE lbd.bank_account_status !=4 AND lbd.empno != '$EmpID'";
if($searchValue != ''){
   $searchQuery .= "AND (lbd.empno LIKE '%".$searchValue."%' OR
            lbd.bank_account_number LIKE '%".$searchValue."%' OR
            u.fname LIKE '%".$searchValue."%' OR
            u.mname LIKE '%".$searchValue."%' OR
            u.sname LIKE '%".$searchValue."%' OR
            u.ename LIKE '%".$searchValue."%'
            )";
}


## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(lbd.empno) as allcount FROM lib_bank_details lbd");
$totalRecords = $records['allcount'];


## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(lbd.empno) as allcount
                                    FROM lib_bank_details lbd
                                    JOIN userprofile u ON u.empno = lbd.empno"
                                    .$searchQuery);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT lbd.*, CONCAT(u.fname,' ',u.mname,' ',u.sname,' ',u.ename) AS fullname
            FROM lib_bank_details lbd
            JOIN userprofile u ON u.empno = lbd.empno
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";
$empRecords = $dbConn->findQuery($sql_emp);
if($empRecords){
   foreach($empRecords as $row){
	$requestID = $row['id'];
    $bank_account_status = $row['bank_account_status'];
    if($bank_account_status ==0){
        $bank_account_status = "<span class='badge bg-light-blue'>PENDING FOR VERIFICATION</span>";
        $action = "
        <td>
            <button class='btn btn-primary btn-sm' id = 'btnVerifyBankDetailsUpload' name ='btnVerifyBankDetailsUpload' value = '$requestID'  title='View' >
                Review
            </button>
        </td>
        ";
    }else if($bank_account_status ==1){
        $bank_account_status = "<span class='badge bg-green'>VERIFIED</span>";
        $action ='REQUEST VERIFIED';
    }else if($bank_account_status ==2){
        $bank_account_status = "<span class='badge bg-red'>FOR COMPLIANCE</span>";
        $action ='FOR COMPLIANCE';
    }else{
        $bank_account_status = 'REQUESTED CHANGES';
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
      "bank_account_number" => $row['bank_account_number'],
      "bank_account_status" => $bank_account_status,
      "bank_account_remarks" => $row['bank_account_remarks']
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