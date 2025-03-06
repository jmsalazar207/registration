<?php
header('Content-Type: application/json');
require_once("includes/init.php");
require_once("includes/helper.php");

// Establish database connection using CONN_DB
$db = CONN_DB::connect();

// SQL query to fetch filled and unfilled positions per division
$sql = "SELECT  
            d.division_name_code,
            SUM(CASE WHEN pos.position_status = 1 THEN 1 ELSE 0 END) AS filled_count,
            SUM(CASE WHEN pos.position_status = 0 THEN 1 ELSE 0 END) AS unfilled_count,
            SUM(CASE WHEN pos.position_status IN (0,1) THEN 1 ELSE 0 END) AS total_positions  
        FROM lib_position pos
        JOIN lib_area_assignment las ON las.area_assignment_code = pos.area_assignment
        JOIN lib_unit u ON u.unit_code = las.unit_code
        JOIN lib_division d ON u.division_code = d.division_code
        GROUP BY d.division_name_code
        ORDER BY d.division_name
        ";

// Execute query using the findQuery() method
$results = $db->findQuery($sql);

$labels = [];
$filled_data = [];
$unfilled_data = [];
$total_positions = [];

if ($results) {
    foreach ($results as $row) {
        $labels[] = $row["division_name_code"];
        $filled_data[] = $row["filled_count"];
        $unfilled_data[] = $row["unfilled_count"];
        $total_positions[] = $row["total_positions"];
    }
}

// Return data as JSON
echo json_encode([
    "labels" => $labels,
    "datasets" => [
        [
            "label" => "Filled Positions",
            "backgroundColor" => 'rgba(75, 192, 192, 0.5)',
            "borderColor" => 'rgba(75, 192, 192, 0.5)',
            "data" => $filled_data
        ],
        [
            "label" => "Unfilled Positions",
            "backgroundColor" => 'rgba(255, 99, 132, 0.5)',
            "borderColor" => 'rgba(255, 99, 132, 0.5)',
            "data" => $unfilled_data
        ]
    ],
    "total_positions" => $total_positions
]);
?>
