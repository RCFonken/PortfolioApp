<?php
// Include the database connection
require_once dirname(__DIR__) . '/Configuration/db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        die("User is not logged in.");
    }

    // Retrieve form data
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Check if the file was uploaded
    if (isset($_FILES['project_image'])) {
        $file = $_FILES['project_image'];
        echo "Uploaded file name: " . $file['name']; // Print the file name

        // Check for upload errors
        if ($file['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/projects/'; // Ensure this directory exists and is writable
            $uploadFile = $uploadDir . basename($file['name']);

            // Attempt to move the uploaded file
            if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
                // Prepare the SQL statement for inserting the project
                $stmt = $pdo->prepare("INSERT INTO projects (user_id, title, description, start_date, end_date, image_path, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())");
                $stmt->execute([$user_id, $title, $description, $start_date, $end_date, $uploadFile]);

                header("Location: /admin");
            } else {
                echo "Failed to upload project image. Check if the upload directory exists and is writable.";
            }
        } else {
            echo "File upload error: " . $file['error'];
        }
    } else {
        echo "Project image not uploaded.";
    }
} else {
    echo "Invalid request method.";
}
?>
