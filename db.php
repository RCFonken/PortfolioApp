<?php

$db_server = "localhost";
$db_username = "root";
$db_password = "Aardbei.13";
$db_name = "portfolioapp";

$conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

if($conn){
    echo "Connected successfully";
}
else{
    echo "Connection failed";
}