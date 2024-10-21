<?php
// Database connection details
$host = 'localhost';
$db = 'address';
$user = 'root';  // Replace with your DB username
$pass = '';      // Replace with your DB password

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the submitted form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$gender = $_POST['gender'];

// Handle image upload
$image = $_FILES['imageUpload']['tmp_name'];
$imageData = addslashes(file_get_contents($image));

// Insert the data into the database
$sql = "INSERT INTO person (name, phone, email, address, gender, image)
        VALUES ('$name', '$phone', '$email', '$address', '$gender', '$imageData')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: people.php");  // Redirect to people.php after successful submission
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
