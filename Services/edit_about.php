<?php
// Start session
session_start();

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
$current_bio = ''; // Initialize as empty string
$current_cv_link = ''; // Initialize as empty string

// Fetch current bio and CV link
$sql = "SELECT bio, cv_link FROM about_me WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $current_bio = $row['bio'] ?? ''; // Use null coalescing to avoid undefined variable
    $current_cv_link = $row['cv_link'] ?? ''; // Use null coalescing to avoid undefined variable
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve posted data
    $bio = $_POST['bio'] ?? null;
    $cv_link = $_POST['cv_link'] ?? null;

    // If both fields are empty, prepare to insert a new record
    if (empty($current_bio) && empty($current_cv_link)) {
        // Insert new record
        $sql = "INSERT INTO about_me (user_id, bio, cv_link) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $user_id, $bio, $cv_link);

        if ($stmt->execute()) {
            echo "New record created successfully.";
        } else {
            echo "Error creating record: " . $stmt->error;
        }
    } else {
        // Prepare to update existing fields
        // Build dynamic SQL query based on provided fields
        $sql = "UPDATE about_me SET ";
        $params = [];
        $types = "";

        // Append fields to SQL if they are set
        if (!empty($bio)) {
            $sql .= "bio = ?, ";
            $params[] = $bio;
            $types .= "s"; // String type
        }
        if (!empty($cv_link)) {
            $sql .= "cv_link = ?, ";
            $params[] = $cv_link;
            $types .= "s"; // String type
        }

        // Remove trailing comma and add condition
        $sql = rtrim($sql, ", ") . " WHERE user_id = ?";
        $params[] = $user_id;
        $types .= "i"; // Integer type

        // Prepare, bind, and execute the statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$params);

        if ($stmt->execute()) {
            header("Location: /admin");
        } else {
            header("Location: /404");
        }
    }

    $stmt->close();
}

// Close the connection
$conn->close();

// Include the admin view after processing
require __DIR__ . '/../views/admin.view.php'; // Adjust path as necessary
?>
