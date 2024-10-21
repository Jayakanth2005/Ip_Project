<?php
// Database connection
$host = 'localhost';
$db = 'address';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, phone, email, address, gender FROM person";
$result = $conn->query($sql);

// Set the CSV file headers
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="people_data.csv"');

// Open the output stream
$output = fopen('php://output', 'w');

// Write the column headers
fputcsv($output, ['Name', 'Phone', 'Email', 'Address', 'Gender']);

// Fetch and write the data rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, [$row['name'], $row['phone'], $row['email'], $row['address'], $row['gender']]);
    }
}

fclose($output);
$conn->close();
exit();
