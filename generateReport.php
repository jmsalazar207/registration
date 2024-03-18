<?php 
 
 require_once('includes/init.php');

 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 

// Excel file name for download 
$date = date('d-m-y h:i:s');
$fileName = "registered_as_of_$date.xlsx"; 

// Define column names 
$excelData[] = array('EMPLOYEE NUMBER', 'NAME', 'MOBILE', 'EMAIL ADDRESS', 'POSITION', 'DIVISION', 'UNIT'); 

$sql = "SELECT up.empno, CONCAT(up.sname,' ',up.fname,' ', up.mname,' ', up.ename) AS fullname, 
        up.mobile, up.eaddress, pos.position_name, d.division_name, u.unit_name
        FROM userprofile up
        JOIN lib_position pos ON pos.position_code =  up.position
        JOIN lib_division d ON d.division_code = up.division
        JOIN lib_unit u ON u.unit_code = up.unit
        GROUP BY up.empno, fullname, up.mobile, up.eaddress, pos.position_name, d.division_name, u.unit_name";
 
// Fetch records from database and store in an array 
$query = $dbConn->findQuery($sql);
if($query){ 
    foreach($query as $row){ 
        $lineData = array($row['empno'], $row['fullname'], $row['mobile'],$row['eaddress'], $row['position_name'],
                         $row['division_name'], $row['unit_name']);  
        $excelData[] = $lineData; 
    } 
} 

// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit;