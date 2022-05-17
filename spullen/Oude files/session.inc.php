<?php
//start de sessie
session_start();

//controleer of een username is opgeslagen
if (!isset($_SESSION['Gebruikersnaam']) || strlen($_SESSION['Gebruikersnaam']) == 0){
    //geen login
    header("Location:../inlog/inlog.php");
    exit;
}
?>
