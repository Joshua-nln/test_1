<?php
require 'config.php';

$Titel = $_POST['Titel'];
$Bestemming = $_POST['Bestemming'];
$Omschrijving = $_POST['Omschrijving'];
$BeginDatum = $_POST['BeginDatum'];
$EindDatum = $_POST['EindDatum'];
$MaxInschrijving = $_POST['MaxInschrijving'];

if($stmt = $mysqli->prepare('INSERT INTO `reizen` (Titel, Bestemming, Omschrijving, BeginDatum, EindDatum, MaxInschrijving) VALUES (?, ?, ?, ?, ?, ?)')){
            // Bindparameters (s = string, i = int, b = blob, etc), in dit geval is de gebruikersnaam een string, dus "s"
            $stmt->bind_param('ssssss', $Titel, $Bestemming, $Omschrijving, $BeginDatum, $EindDatum, $MaxInschrijving);
            // voer SQL uit
            $stmt->execute(); 

            header('Location: band_uitlees.php');
            echo "<p>User $naam is toegevoegd.</p>";
        }else{
             echo "<p>FOUT bij toevoegen.</p>";
 echo mysqli_error($mysqli);
        }
        
echo "<p><a href='band_uitlees.php'>Terug</a></p>";
?>