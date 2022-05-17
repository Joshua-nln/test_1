<?php
//start de session
session_start();

//controleer of er een username is opgeslagen
if (!isset($_SESSION['studentnummer']) || strlen($_SESSION['studentnummer']) == 0) {
    //geen geldige login, stuur naar home
    header("Location:login/inlog.php");
    exit;
}
?>
