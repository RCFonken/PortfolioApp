<?php
// Start a session if it is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include your private configuration
$app = require __DIR__ . '/private.php'; // Adjusted path

// Database connection details
$database = $app["database"];

// Database connection using PDO
try {
    $dsn = "mysql:host={$database['host']};dbname={$database['dbname']};charset=utf8mb4";
    $pdo = new PDO($dsn, $database['username'], $database['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
