<?php
$app = require_once __DIR__ . "../../Configuration/private.php";

class UserFactory
{
    private $connection;

    public function __construct()

    {
        $this->connection = $this->getConnection();
    }

    private function getConnection()
    {
        global $app;
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

        return $conn;
    }

    public function createUserIfNotExist($username, $password, $email, $isAdmin)
    {
        if (!$this->userExists($username)) {
            $this->createUser($username, $password, $email, $isAdmin);
        }
    }

    private function userExists($username){
        $stmt = $this->connection->prepare("SELECT count(*) FROM users WHERE username = ?");
        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();
            return $count > 0;
        }
        return false;
    }

    public function createUser($username, $password, $email, $isAdmin)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->connection->prepare("INSERT INTO users (username, password, email, is_admin) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("ssss", $username, $hashedPassword, $email, $isAdmin);
            $stmt->execute();
            $stmt->close();
        }
    }

}