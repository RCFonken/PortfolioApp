<?php
require_once __DIR__ . '/../Configuration/db_connect.php'; // Connect to the database

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['project_id'])) {
    $project_id = $_POST['project_id'];
    // Delete project from database
    $stmt = $pdo->prepare("DELETE FROM projects WHERE project_id = ?");
    $stmt->execute([$project_id]);
    header("Location: /admin");
    exit;
}
?>
