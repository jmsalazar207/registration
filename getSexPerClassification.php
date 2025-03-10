<?php
header('Content-Type: application/json');
require_once("includes/init.php");
require_once("includes/helper.php");

// Establish database connection using CONN_DB
$db = CONN_DB::connect();

// SQL query to fetch filled and unfilled positions per division
$sql = "SELECT 
        lce.classification_employment_name, 
        SUM(CASE WHEN u.sex = 0 THEN 1 ELSE 0 END) AS male_count,
        SUM(CASE WHEN u.sex = 1 THEN 1 ELSE 0 END) AS female_count,
        SUM(CASE WHEN u.sex IN (0, 1) THEN 1 ELSE 0 END) AS total_positions  -- Sum of male and female
        FROM userprofile u
        JOIN lib_position pos ON pos.position_id = u.position_id
        JOIN lib_classification_employment lce ON lce.position_classification_id = pos.position_classification_id
        WHERE u.emp_status = 0
        GROUP BY lce.classification_employment_name
        ";

// Execute query using the findQuery() method
$results = $db->findQuery($sql);

$labels = [];
$male_data = [];
$female_data = [];
$total_positions = [];

if ($results) {
    foreach ($results as $row) {
        $labels[] = $row["classification_employment_name"];
        $male_data[] = $row["male_count"];
        $female_data[] = $row["female_count"];
        $total_positions[] = $row["total_positions"];
    }
}

// Return data as JSON
echo json_encode([
    "labels" => $labels,
    "datasets" => [
        [
            "label" => "Male",
            "backgroundColor" => 'rgba(75, 192, 192, 0.5)',
            "borderColor" => 'rgba(75, 192, 192, 0.5)',
            "data" => $male_data
        ],
        [
            "label" => "Female",
            "backgroundColor" => 'rgba(255, 99, 132, 0.5)',
            "borderColor" => 'rgba(255, 99, 132, 0.5)',
            "data" => $female_data
        ]
    ],
    "total_positions" => $total_positions
]);
?>
