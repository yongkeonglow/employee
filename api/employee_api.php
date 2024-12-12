<?php
header("Content-Type: application/json");

$file = '../data/employees.json';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (file_exists($file)) {
        $employees = json_decode(file_get_contents($file), true);
        echo json_encode($employees);
    } else {
        echo json_encode(['error' => 'No employee data found.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed.']);
}
?>
