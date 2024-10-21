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

// Check if ID is set
if (!isset($_GET['id'])) {
    die("ID not provided");
}

$id = $_GET['id'];

// Delete the person from the database
$sql = "DELETE FROM person WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: people.php");  // Redirect back to the list
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
