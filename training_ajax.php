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



$session_empno = $_SESSION['userID'];
$searchQuery = " WHERE empno = '$session_empno' AND training_status !=4 ";

if ($searchValue != '') {
    $searchQuery .= " AND (empno LIKE '%" . $searchValue . "%' 
                    OR training_title LIKE '%" . $searchValue . "%' 
                    OR training_date_from LIKE '%" . $searchValue . "%' 
                    OR training_date_to LIKE '%" . $searchValue . "%' 
                    OR training_hours LIKE '%" . $searchValue . "%' 
                    OR training_conducted_by LIKE '%" . $searchValue . "%'
                    OR training_remarks LIKE '%" . $searchValue . "%'
                    OR (
                        CASE 
                            WHEN training_type = 1 THEN 'MANAGERIAL'
                            WHEN training_type = 2 THEN 'SUPERVISORY'
                            WHEN training_type = 3 THEN 'TECHNICAL'
                            ELSE 'OTHER'
                        END
                    ) LIKE '%$searchValue%'
                    )";
}

## Total number of records without filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount FROM lib_training");
$totalRecords = $records['allcount'];

## Total number of records with filtering
$records = $dbConn->findFirstQuery("SELECT COUNT(empno) as allcount FROM lib_training $searchQuery");
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$sql_emp = "SELECT *, CONCAT(training_date_from,' ','to',' ',training_date_to) AS training_period
            FROM lib_training
            $searchQuery ORDER BY $columnName $columnSortOrder limit $row, $rowperpage";

$empRecords = $dbConn->findQuery($sql_emp);

if ($empRecords) {
    foreach ($empRecords as $row) {
        $id = $row['id'];
        $url = "trainingDelete.php";
        $uploadedTrainingMOV = $row['training_uploaded_mov'];
        $training_type = $row['training_type'];
        if ($training_type == 1) {
            $training_type = 'MANAGERIAL';
        }
        if ($training_type == 2) {
            $training_type = 'SUPERVISORY';
        }
        if ($training_type == 3) {
            $training_type = 'TECHNICAL';
        }
        $training_status = $row['training_status'];
        if ($training_status == 0) {
            $training_status = "<span class='badge bg-light-blue'>PENDING FOR VERIFICATION</span>";
            $action = "
            <td>
                <button class='btn btn-primary btn-sm' id='btnUserTrainingUpdate' name='btnUserTrainingUpdate' value='$id' title='View'>
                    Update
                </button>
            </td>
            <td>
                <button class='btn btn-danger btn-sm' id='btnUserTrainingDelete' name='btnUserTrainingDelete' data-valueID='$id' data-valueURL='$url' title='Remove Information'>
                    Remove
                </button>
            </td>";
        }
        if ($training_status == 1) {
            $training_status = "<span class='badge bg-green'>VERIFIED</span>";
            $action = "
            <td>
                <button class='btn btn-info btn-sm' id='btnUserTrainingViewUploaded' name='btnUserTrainingViewUploaded' value='$uploadedTrainingMOV' title='View Uploaded'>
                    View
                </button>
            </td>
            <td>
                <button class='btn btn-danger btn-sm' id='btnUserTrainingDelete' name='btnUserTrainingDelete' data-valueID='$id' data-valueURL='$url' title='Remove Information'>
                    Remove
                </button>
            </td>";
        }
        if ($training_status == 2) {
            $training_status = "<span class='badge bg-red'>FOR COMPLIANCE</span>";
            $action = "
            <td>
                <button class='btn btn-primary btn-sm' id='btnUserTrainingUpdate' name='btnUserTrainingUpdate' value='$id' title='View'>
                    Update
                </button>
            </td>
            <td>
                <button class='btn btn-danger btn-sm' id='btnUserTrainingDelete' name='btnUserTrainingDelete' data-valueID='$id' data-valueURL='$url' title='Remove Information'>
                    Remove
                </button>
            </td>";
        }

        $data[] = array(
            "Action" => $action,
            "training_title" => $row['training_title'],
            "training_period" => $row['training_period'],
            "training_hours" => $row['training_hours'],
            "training_type" => $training_type,
            "training_conducted_by" => $row['training_conducted_by'],
            "training_status" => $training_status,
            "training_remarks" => $row['training_remarks']
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