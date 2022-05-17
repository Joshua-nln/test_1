<?php
error_reporting(E_ALL);
ini_set('display_errors', ' 1');

// log into database
$db_hostname = 'localhost:3306';
$db_username = 'ex85671';
$db_password = 'Saver2003';
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
