<?php

error_reporting( E_ALL);
ini_set("display_errors", 1);

$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'test';

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (!$mysqli) {
    echo "Fout: geen connnectie naar database. <br>";
    echo "Errno: " . mysqli_connect_errno() . "<br>";
    echo "Error: " . mysqli_connect_error() . "<br>";
    exit;
}