<?php 
 
 require_once('includes/init.php');

 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 

// Excel file name for download 
$date = date('d-m-y h:i:s');
$fileName = "extracted_data_as_of_$date.xlsx"; 

// Define column names 
$excelData[] = array('EMPLOYEE NUMBER','FIRST NAME', 'MIDDLE NAME', 'LAST NAME', 'EXTENSION NAME','FULL NAME','EMPLOYEE STATUS','ACCOUNT STATUS', 'ITEM CODE','POSITION','POSITION STATUS','CLASSIFICATION STATUS','FUND SOURCE','CREATED DIVISION','CREATED UNIT','AREA DIVISION','AREA UNIT','AREA ASSIGNEMNT','OFFICE LOCATION'); 

$sql = "SELECT u.empno,u.fname, u.mname, u.sname, u.ename,CONCAT(u.fname,' ',u.mname,' ', u.sname,' ', u.ename)as fullname, 
        les.status_description AS empStatus, lacts.account_status_name AS acctStat, pos.item_code, posn.position_name, postat.position_status_description,
        lce.classification_employment_name, lfs.fund_source_name,cdivision.division_name AS createdDivision, cunit.unit_name AS createdUnit, 
        d.division_name AS areaDivision, un.unit_name AS areaUnit, las.area_assignment_name, lot.office_location_name
        FROM userprofile u
        LEFT JOIN lib_emp_status les ON les.emp_status_id = u.emp_status
        LEFT JOIN lib_account_status lacts ON lacts.account_status_code = u.account_status
        LEFT JOIN lib_position pos ON pos.position_id = u.position_id
        LEFT JOIN lib_position_name posn ON posn.position_name_id = pos.position_name_id
        LEFT JOIN lib_position_status postat ON postat.position_status = pos.position_status
        LEFT JOIN lib_classification_employment lce ON lce.position_classification_id = pos.position_classification_id
        LEFT JOIN lib_fund_source lfs ON lfs.fund_source_code = pos.fund_source_code
        LEFT JOIN lib_unit cUnit ON cunit.unit_code = pos.unit_code
        LEFT JOIN lib_division cDivision ON cdivision.division_code = cunit.division_code
        LEFT JOIN lib_area_assignment las ON las.area_assignment_code = pos.area_assignment
        LEFT JOIN lib_unit un ON un.unit_code = las.unit_code
        LEFT JOIN lib_division d ON d.division_code = un.division_code
        LEFT JOIN lib_office_location lot ON lot.office_location_code = las.office_location_code
        ";
 
// Fetch records from database and store in an array 
$query = $dbConn->findQuery($sql);
if($query){ 
    foreach($query as $row){ 
        $lineData = array(
            $row['empno'],$row['fname'],$row['mname'],$row['sname'],$row['ename'],$row['fullname'],
            $row['empStatus'],$row['acctStat'],$row['item_code'],$row['position_name'],
            $row['position_status_description'],$row['classification_employment_name'],
            $row['fund_source_name'],$row['createdDivision'],
            $row['createdUnit'],$row['areaDivision'],$row['areaUnit'],$row['area_assignment_name'],
            $row['office_location_name']
        );  
        $excelData[] = $lineData; 
    } 
} 

// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit;