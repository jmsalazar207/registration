<?php
session_start();
header('Content-Type: application/json');
require_once('includes/init.php');
// ini_set('display_errors', 0); // Don't show on screen
// ini_set('log_errors', 1);     // Force logging
// ini_set('error_reporting', E_ALL); // Log everything
// ini_set('error_log', __DIR__ . '/debug.log'); // Write to a local log file

$data = array();

// Read values
$draw = isset($_POST['draw']) ? intval($_POST['draw']) : 1;
$row = isset($_POST['start']) ? intval($_POST['start']) : 0;
$rowperpage = isset($_POST['length']) ? intval($_POST['length']) : 10;
$columnIndex = isset($_POST['order'][0]['column']) ? intval($_POST['order'][0]['column']) : 0;
$columnName = isset($_POST['columns'][$columnIndex]['data']) ? $_POST['columns'][$columnIndex]['data'] : 'position_id';
$columnSortOrder = isset($_POST['order'][0]['dir']) ? ($_POST['order'][0]['dir'] === 'asc' ? 'ASC' : 'DESC') : 'ASC';
$searchValue = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';

// 1. Fast count for total records
$totalRecords = $dbConn->findFirstQuery("SELECT COUNT(*) as allcount FROM lib_position")['allcount'];

// 2. Get all position_ids that match the search in userprofile
$matchingUserProfileIds = [];
if (!empty($searchValue)) {
    $userProfileSql = "SELECT DISTINCT position_id FROM userprofile
                        WHERE emp_status = 0 AND
                        (CONCAT(fname, ' ', COALESCE(mname, ''), ' ', sname, ' ', COALESCE(ename, '')) LIKE '%$searchValue%'
                         OR date_filled LIKE '%$searchValue%')";
    $userProfiles = $dbConn->findQuery($userProfileSql);
    if ($userProfiles && is_array($userProfiles)) {
        foreach ($userProfiles as $profile) {
            $matchingUserProfileIds[] = $profile['position_id'];
        }
    }
}

// Limit the number of IDs in the IN clause to prevent potential errors
$max_in_clause = 500; // Adjust this value as needed
$limitedUserProfileIds = array_slice($matchingUserProfileIds, 0, $max_in_clause);

// 3. Build the main query
$mainQuery = "
FROM lib_position pos
JOIN lib_position_name pn ON pn.position_name_id = pos.position_name_id
JOIN lib_position_status pstat ON pstat.position_status = pos.position_status
LEFT JOIN lib_classification_employment cs ON cs.position_classification_id = pos.position_classification_id
LEFT JOIN lib_fund_source fs ON fs.fund_source_code = pos.fund_source_code
LEFT JOIN lib_area_assignment las ON las.area_assignment_code = pos.area_assignment
LEFT JOIN lib_unit u ON las.unit_code = u.unit_code
LEFT JOIN lib_division d ON u.division_code = d.division_code
WHERE pos.position_status < 3";

$searchConditions = [];
$searchParams = [];

if (!empty($searchValue)) {
    // Build LIKE conditions with bindable parameters
    $likeFields = [
        "pos.item_code",
        "pn.position_name",
        "pos.position_id",
        "cs.classification_employment_name",
        "pstat.position_status_description",
        "fs.fund_source_name",
        "d.division_name",
        "u.unit_name",
        "las.area_assignment_name"
    ];

    foreach ($likeFields as $field) {
        $searchConditions[] = "$field LIKE ?";
        $searchParams[] = "%$searchValue%";
    }

    // Add position_id IN (...) only if there are matched IDs
    if (!empty($limitedUserProfileIds)) {
        $placeholders = implode(',', array_fill(0, count($limitedUserProfileIds), '?'));
        $searchConditions[] = "pos.position_id IN ($placeholders)";
        $searchParams = array_merge($searchParams, $limitedUserProfileIds);
    }

    // Append to main query
    $mainQuery .= " AND (" . implode(" OR ", $searchConditions) . ")";
}


// 5. Get filtered count
$totalRecordwithFilter = $dbConn->findFirstQuery("SELECT COUNT(pos.position_id) as allcount " . $mainQuery, $searchParams)['allcount'];


// 6. Get required records with minimal fields
$sql = "SELECT
    pos.position_id,
    pos.item_code,
    pn.position_name,
    cs.classification_employment_name,
    fs.fund_source_name,
    pos.date_creation_position,
    pos.salary_history_id,
    d.division_name,
    u.unit_name,
    las.area_assignment_name,
    pstat.position_status_description
" . $mainQuery . "
ORDER BY " . ($columnName == "Action" ? "pos.position_id" : $columnName) . " $columnSortOrder
LIMIT $row, $rowperpage";

// error_log("Final SQL Query: " . $sql); // logs to PHP error log

// OR for quick display in response (for debugging only):


$Records = $dbConn->findQuery($sql, $searchParams);

// 7. Collect all position IDs for a single efficient query
$positionIds = [];
if ($Records && is_array($Records)) {
    foreach ($Records as $record) {
        $positionIds[] = $record['position_id'];
    }
}

// 8. Get user profiles in a single query
$filledBy = [];
if (!empty($positionIds)) {
    $positionIdsStr = implode(',', $positionIds);
    $userSql = "SELECT
        position_id,
        CONCAT(fname, ' ', COALESCE(mname, ''), ' ', sname, ' ', COALESCE(ename, '')) AS filled_by,
        date_filled
    FROM userprofile
    WHERE position_id IN ($positionIdsStr) AND emp_status = 0";

    $userRecords = $dbConn->findQuery($userSql);
    if ($userRecords && is_array($userRecords)) {
        foreach ($userRecords as $user) {
            $filledBy[$user['position_id']] = [
                'filled_by' => $user['filled_by'],
                'date_filled' => $user['date_filled']
            ];
        }
    }
}

// 9. Combine the data
if ($Records && is_array($Records)) {
    foreach ($Records as $row) {
        $id = $row['position_id'];
        $action = "<td><button class='btn btn-primary btn-sm' id='btnPositionHistory' name='btnPositionHistory' value='$id' title='Update'>Update</button></td>";

        // Get user info from lookup array
        $filled_by = '';
        $date_filled = '';
        if (isset($filledBy[$id])) {
            $filled_by = $filledBy[$id]['filled_by'];
            $date_filled = $filledBy[$id]['date_filled'];
        }

        $data[] = array(
            "Action" => $action,
            "item_code" => $row['item_code'],
            "position_name" => $row['position_name'],
            "position_status_description" => $row['position_status_description'],
            "classification_employment_name" => $row['classification_employment_name'],
            "fund_source_name" => $row['fund_source_name'],
            "date_creation_position" => $row['date_creation_position'],
            "salary_history_id" => $row['salary_history_id'],
            "division_name" => $row['division_name'],
            "unit_name" => $row['unit_name'],
            "area_assignment_name" => $row['area_assignment_name'],
            "filled_by" => $filled_by,
            "date_filled" => $date_filled
        );
    }
}

// Response
$response = array(
    "draw" => $draw,
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
?>
