<?php 
 
 require_once('includes/init.php');

 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 

// Excel file name for download 
$date = date('d-m-y h:i:s');
$fileName = "registered_as_of_$date.xlsx"; 

// Define column names 
$excelData[] = array('EMPLOYEE NUMBER', 'FIRST NAME', 'MIDDLE NAME', 'LAST NAME', 'EXTENSION NAME', 'MOBILE', 'EMAIL ADDRESS', 'POSITION', 'DIVISION', 'UNIT'); 

$sql = "SELECT up.empno, up.sname,up.fname,up.mname, up.ename, 
            up.mobile, up.eaddress, pn.position_name, d.division_name, u.unit_name
            FROM userprofile up
            LEFT JOIN lib_position pos ON pos.position_id =  up.position_id
            LEFT JOIN lib_position_name pn ON pos.position_name_id = pn.position_name_id
            LEFT JOIN lib_unit u ON pos.unit_code = u.unit_code
            LEFT JOIN lib_division d ON u.division_code = d.division_code
            GROUP BY up.empno, up.sname,up.fname,up.mname, up.ename, 
            up.mobile, up.eaddress, pn.position_name, d.division_name, u.unit_name";
 
// Fetch records from database and store in an array 
$query = $dbConn->findQuery($sql);
if($query){ 
    foreach($query as $row){ 
        $lineData = array($row['empno'], $row['fname'],$row['mname'],$row['sname'],$row['ename'], $row['mobile'],$row['eaddress'], $row['position_name'],
                         $row['division_name'], $row['unit_name']);  
        $excelData[] = $lineData; 
    } 
} 

// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit;