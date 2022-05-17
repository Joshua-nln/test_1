<?php

if (isset($_POST['submit']))
{
    require 'config.php';

$ReisID = $_POST['ReisID'];
$Titel = $_POST['Titel'];
$Bestemming = $_POST['Bestemming'];
$Omschrijving = $_POST['Omschrijving'];
$BeginDatum = $_POST['BeginDatum'];
$EindDatum = $_POST['EindDatum'];
$MaxInschrijving = $_POST['MaxInschrijving'];


    $query = "UPDATE reizen
    SET Titel ='$Titel', Bestemming ='$Bestemming', Omschrijving = '$Omschrijving',
             BeginDatum ='$BeginDatum', EindDatum ='$EindDatum', MaxInschrijving ='$MaxInschrijving'
        WHERE ReisID = '$ReisID'";


    if(mysqli_query($mysqli, $query))
    {
        header('Location: band_uitlees.php');
        echo "<p>Band $Naam is aangepast.</p>";
    }
    else
    {
        echo "<p>FOUT bij aanpassen Band met ID $ID.</p>";
        echo mysqli_error($mysqli);
    }
}
else
{
    echo "<p>Geen gegevens ontvangen...</p>";

}

echo "<p><a href='band_uitlees.php'>TERUG</a> naar overzicht</p>";




?>
