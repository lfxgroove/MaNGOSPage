<?php

// Put the login credentials between the quotes
$ip = ""; // ip of the database server
$username = ""; // username of the database user
$password = ""; // password of the database user
$database = "realmd"; // this is the correct database name by default

if (!function_exists('mysqli_connect'))
{
    echo error_message("MySQLi is needed to work");
    exit();
}

$connection = @new mysqli($ip, $username, $password);

if (!$connection->connect_error)
{
    $connection->select_db($database);
    $connection->set_charset("utf8");
}
else
{
    echo error_message("Can't reach the database. Please try again later!");
    exit();
}
?>