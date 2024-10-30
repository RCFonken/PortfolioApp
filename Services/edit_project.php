<?php
require_once __DIR__ . '/../Configuration/db_connect.php'; // Connect to the database

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];
    $stmt = $pdo->prepare("SELECT * FROM projects WHERE project_id = ?");
    $stmt->execute([$project_id]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['project_id'])) {
    $project_id = $_POST['project_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    // Update project in database
    $stmt = $pdo->prepare("UPDATE projects SET title = ?, description = ?, start_date = ?, end_date = ?, updated_at = NOW() WHERE project_id = ?");
    $stmt->execute([$title, $description, $start_date, $end_date, $project_id]);
    header("Location: /admin");
    exit;
}

//Edit Project Form
require_once __DIR__ . '/../views/edit.project.view.php'; // Connect to the database
?>