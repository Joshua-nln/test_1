<?php
require '../config.php';

$titel = $_POST['titel'];
$bestemming = $_POST['bestemming'];
$omschrijving = $_POST['omschrijving'];
$begindatum = $_POST['begindatum'];
$einddatum = $_POST['einddatum'];
$max_inschrijvingen = $_POST['max_inschrijvingen'];


if($stmt = $mysqli->prepare('INSERT INTO `reizen` (titel, bestemming, omschrijving, begindatum, einddatum, max_inschrijvingen) VALUES (?, ?, ?, ?, ?, ?)')){
            // Bindparameters (s = string, i = int, b = blob, etc), in dit geval is de gebruikersnaam een string, dus "s"
            $stmt->bind_param('ssssss', $titel, $bestemming, $omschrijving, $begindatum, $einddatum, $max_inschrijvingen);
            // voer SQL uit
            $stmt->execute();

            header('Location: ../index.php');
            echo "<p>User $naam is toegevoegd.</p>";
        }else{
             echo "<p>FOUT bij toevoegen.</p>";
 echo mysqli_error($mysqli);
        }

echo "<p><a href='band_uitlees.php'>Terug</a></p>";
?>
