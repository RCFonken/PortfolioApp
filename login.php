<?php
// Start session
session_start();

$app = require "private.php";
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

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // If a user is found
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // In practice, use password_hash and password_verify to secure passwords
        if ($password == $row['password']) {  // Use password_verify() with hashed passwords
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;

            // Redirect to the admin dashboard
            header("Location: /admin");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }

    $stmt->close();
}

$conn->close();
?>
