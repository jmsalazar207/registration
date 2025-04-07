<?php
require_once('includes/init.php');
require_once 'PhpXlsxGenerator.php';

// Excel file name for download
$date = date('d-m-y_H-i-s');  // Replaced colon (:) with underscore (_)
$fileName = "extracted_data_as_of_$date.xlsx";

// Define column names
$excelData[] = array('EMPLOYEE NUMBER', 'ITEM NUMBER', 'FIRST NAME', 'MIDDLE NAME', 'LAST NAME', 'EXTENSION NAME', 'FULL NAME', 'POSITION', 'SALARY GRADE', 'FUND SOURCE', 'CLASSIFICATION OF STATUS', 'DIVISION', 'UNIT', 'AREA OF ASSIGNMENT', 'TIN');

// SQL query to fetch the data
$sql = "SELECT u.empno, u.fname, u.mname, u.sname, u.ename, CONCAT(u.fname,' ',u.mname,' ', u.sname,' ', u.ename) as fullname, pn.position_name,
        pos.salary_history_id, pos.item_code, fs.fund_source_name, ce.classification_employment_name, d.division_name, un.unit_name, las.area_assignment_name, 
        pos.salary_history_id, pi.tin_no
        FROM userprofile u
        LEFT JOIN lib_position pos ON pos.position_id = u.position_id
        LEFT JOIN lib_fund_source fs ON fs.fund_source_code = pos.fund_source_code
        LEFT JOIN lib_classification_employment ce ON ce.position_classification_id = pos.position_classification_id
        LEFT JOIN lib_position_name pn ON pos.position_name_id = pn.position_name_id
        LEFT JOIN lib_area_assignment las ON las.area_assignment_code = pos.area_assignment
        LEFT JOIN lib_unit un ON un.unit_code = las.unit_code
        LEFT JOIN lib_division d ON un.division_code = d.division_code
        LEFT JOIN lib_personal_info pi ON u.empno = pi.empno
        WHERE u.emp_status = 0 AND u.position_id != ''";

// Fetch records from the database
$query = $dbConn->findQuery($sql);
if ($query) {
    foreach ($query as $row) {
        $lineData = array($row['empno'], $row['item_code'], $row['fname'], $row['mname'], $row['sname'], $row['ename'], $row['fullname'], $row['position_name'], $row['salary_history_id'], $row['fund_source_name'], $row['classification_employment_name'],
                         $row['division_name'], $row['unit_name'], $row['area_assignment_name'], $row['tin_no']);
        $excelData[] = $lineData;
    }
}

// Define the save path for the file
$savePath = 'downloads/' . $fileName;

// Check if the 'downloads' directory exists, if not, create it
if (!file_exists('downloads')) {
    mkdir('downloads', 0777, true); // Create the directory with proper permissions
}

// Generate the Excel file and save it
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray($excelData);
$xlsx->saveAs($savePath);

// Return the file URL for downloading
echo json_encode(['downloadUrl' => $savePath]);
exit;
?>
