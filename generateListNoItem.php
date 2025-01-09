<?php 
 
 require_once('includes/init.php');

 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 

// Excel file name for download 
$date = date('d-m-y h:i:s');
$fileName = "account_without_itemcode_as_of_$date.xlsx"; 

// Define column names 
$excelData[] = array('EMPLOYEE NUMBER', 'FIRST NAME', 'MIDDLE NAME', 'LAST NAME', 'EXTENSION NAME','EMPLOYEE STATUS','ITEM CODE'); 

$sql = "SELECT u.empno, u.fname, u.mname, u.sname, u.ename, u.emp_status
FROM userprofile u
WHERE u.position_id ='' AND emp_status =0";
 
// Fetch records from database and store in an array 
$query = $dbConn->findQuery($sql);
if($query){ 
    foreach($query as $row){ 
        $lineData = array($row['empno'], $row['fname'],$row['mname'],$row['sname'],$row['ename'],$row['emp_status'],'');  
        $excelData[] = $lineData; 
    } 
} 

// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit;