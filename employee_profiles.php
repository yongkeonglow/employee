<?php
$file = 'data/employees.json';

if (file_exists($file)) {
    $employees = json_decode(file_get_contents($file), true);
} else {
    $employees = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profiles</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f9;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Employee Profiles</h2>
    <?php if (!empty($employees)): ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Marital Status</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>DOB</th>
                    <th>Nationality</th>
                    <th>Hire Date</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?= htmlspecialchars($employee['name']); ?></td>
                        <td><?= htmlspecialchars($employee['gender']); ?></td>
                        <td><?= htmlspecialchars($employee['marital_status']); ?></td>
                        <td><?= htmlspecialchars($employee['phone']); ?></td>
                        <td><?= htmlspecialchars($employee['email']); ?></td>
                        <td><?= htmlspecialchars($employee['address']); ?></td>
                        <td><?= htmlspecialchars($employee['dob']); ?></td>
                        <td><?= htmlspecialchars($employee['nationality']); ?></td>
                        <td><?= htmlspecialchars($employee['hire_date']); ?></td>
                        <td><?= htmlspecialchars($employee['department']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center;">No employee data available.</p>
    <?php endif; ?>
</body>
</html>
