<?php
// projects_data.php
require_once __DIR__ . '/../Configuration/db_connect.php'; // Adjusted path

function getProjects() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
