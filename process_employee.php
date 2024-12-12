<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'name' => htmlspecialchars(trim($_POST['name'])),
        'gender' => htmlspecialchars($_POST['gender']),
        'marital_status' => htmlspecialchars($_POST['marital_status']),
        'phone' => htmlspecialchars(trim($_POST['phone'])),
        'email' => htmlspecialchars(trim($_POST['email'])),
        'address' => htmlspecialchars(trim($_POST['address'])),
        'dob' => htmlspecialchars($_POST['dob']),
        'nationality' => htmlspecialchars(trim($_POST['nationality'])),
        'hire_date' => htmlspecialchars($_POST['hire_date']),
        'department' => htmlspecialchars(trim($_POST['department']))
    ];

    // Validate email
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email format.");
    }

    $file = 'data/employees.json';
    $employees = [];

    // Ensure the directory exists
    if (!is_dir('data')) {
        mkdir('data', 0755, true);
    }

    // Load existing data
    if (file_exists($file)) {
        $employees = json_decode(file_get_contents($file), true);
    }

    $employees[] = $data;

    // Save to JSON file
    if (file_put_contents($file, json_encode($employees, JSON_PRETTY_PRINT))) {
        header("Location: employee_profiles.php");
        exit();
    } else {
        die("Error: Unable to save data.");
    }
} else {
    die("Error: Invalid request method.");
}
?>
