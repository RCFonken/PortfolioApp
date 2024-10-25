<?php //index.php code
require_once __DIR__ . '/Factories/UserFactory.php';
// die(var_dump(phpinfo()));

// sessie opstarten
$app = require __DIR__ . "/Configuration/private.php";
$database = $app["database"];
$route = require __DIR__ . "/Services/route.php";

$userFactory = new UserFactory();

session_start();

$defaultUsername = 'admin';
$defaultPassword = 'Admin.123';
$defaultEmail = 'example@email.com';

$userFactory->createUserIfNotExist($defaultUsername, $defaultPassword, $defaultEmail, true);

if (array_key_exists($_SERVER["REQUEST_URI"], $route)) {
    require $route[$_SERVER["REQUEST_URI"]];
} else {
    header("Location: /404");
}