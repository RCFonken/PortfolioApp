<?php

// Include your database configuration
$app = require __DIR__ . "../../Configuration/private.php";
$database = $app["database"];

// Database connection
$servername = $database['host'];
$username = $database['username'];
$password = $database['password'];
$dbname = $database['dbname'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please log in.");
}

$user_id = $_SESSION['user_id']; // Get the logged-in user's ID

// Initialize variables to avoid undefined variable warnings
$bio = ''; // Ensure this is defined
$cv_link = ''; // Optional: If you want to use it later

// Fetch current bio and CV link
$sql = "SELECT bio, cv_link FROM about_me WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $bio = $row['bio'] ?? ''; // Ensure $bio is assigned
    $cv_link = $row['cv_link'] ?? ''; // Fetch the CV link
} else {
    $bio = 'No bio available.'; // Fallback if no bio exists
}

$stmt->close();
$conn->close();
?>
