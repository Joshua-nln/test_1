<?php
error_reporting(E_ALL);
ini_set('display_errors', ' 1');

// log into database
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'ex85671';

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

//check to see if its connected, if not give error code
if (!$mysqli) {
    echo "FOUT: geen connectie naar database.  <br>";
    echo "errno: " . mysqli_connect_errno() . "<br/>";
    echo "error: " . mysqli_connect_error() . "<br/>";
    exit;
}
?>
