<?php
require_once('includes/init.php');
require_once 'PhpXlsxGenerator.php';

// Excel file name for download
$date = date('d-m-y_H-i-s');  // Changed to replace colons with underscores
$fileName = "account_without_itemcode_as_of_$date.xlsx";

// Define column names
$excelData[] = array('EMPLOYEE NUMBER', 'FIRST NAME', 'MIDDLE NAME', 'LAST NAME', 'EXTENSION NAME', 'EMPLOYEE STATUS', 'ITEM CODE');

// SQL query to get the data
$sql = "SELECT u.empno, u.fname, u.mname, u.sname, u.ename, u.emp_status
        FROM userprofile u
        WHERE u.position_id ='' AND u.emp_status = 0";

// Fetch data from the database
$query = $dbConn->findQuery($sql);
if ($query) {
    foreach ($query as $row) {
        $lineData = array($row['empno'], $row['fname'], $row['mname'], $row['sname'], $row['ename'], $row['emp_status'], '');  // Empty item code
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
