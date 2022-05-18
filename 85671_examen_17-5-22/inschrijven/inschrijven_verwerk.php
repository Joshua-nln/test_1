<?php
//lees het config bestand
require '../config.php';
require_once '../session.inc.php';

//lees alle formuliervelden
$id            = $_POST['boekingsnummer'];
$studentnummer = $_POST['studentnummer'];
$opmerkingen   = $_POST['opmerkingen'];

$result1 = mysqli_query($mysqli, "SELECT * FROM reizen WHERE boekingsnummer = $id");
$result2 = mysqli_query($mysqli, "SELECT * FROM users WHERE studentnummer = $studentnummer");
$result3 = mysqli_query($mysqli, "SELECT * FROM inschrijvingen WHERE studentnummer = $id");
$rij2    = mysqli_fetch_array($result3);

if (mysqli_num_rows($result3) < 1) {
    //controleer of alle formuliervelden waren ingevuld
    if (is_numeric($id) && is_numeric($studentnummer)) {
        //als alle data ok zijn, maak dan de query
        $query  = "INSERT INTO `inschrijvingen`(boekingsnummer, studentnummer, opmerkingen) VALUES ('$id', '$studentnummer', '$opmerkingen');";
        //voet de query uit
        $result = mysqli_query($mysqli, $query);
        //controleer het resultaat
        if ($result) {
            //alles ok stuur terug naar de homepage
            echo "<h1>Je bent succesvol ingeschreven</h1><br>";
            echo "<a href='../index.php' id='submit'>Terug</a><br><br>";
            exit;
        } else {
            echo 'er ging wat mis met het bewerken';
        }
    } else {
        echo 'Niet alle velden waren ingevuld!';
    }
} else {
    echo "<p>Je bent al ingeschreven bij een reis</p><br>";
    echo "<button id='submit' onclick='history.back();return false;'>Terug.</button>";
}
?>
