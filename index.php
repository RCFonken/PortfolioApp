<?php //index.php code

// die(var_dump(phpinfo()));

// sessie opstarten
$app = require "private.php";
$database = $app["database"];
$route = require "route.php";

session_start();

if (array_key_exists($_SERVER["REQUEST_URI"], $route)) {
    require $route[$_SERVER["REQUEST_URI"]];
} else {
    header("Location: /404");
}