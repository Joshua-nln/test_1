<?php

if (isset($_POST['submit'])) {
    require '../config.php';

    //maak prepared variabelen aan van data uit de database
    $boekingsnummer     = $_POST['boekingsnummer'];
    $titel              = $_POST['titel'];
    $bestemming         = $_POST['bestemming'];
    $omschrijving       = $_POST['omschrijving'];
    $begindatum         = $_POST['begindatum'];
    $einddatum          = $_POST['einddatum'];
    $max_inschrijvingen = $_POST['max_inschrijvingen'];
    $img                = $_POST['img'];

    //maak de query met de update fucntie om data uit de database aan te passen
    $query = "UPDATE reizen
    SET titel ='$titel', bestemming ='$bestemming', omschrijving = '$omschrijving',
             begindatum ='$begindatum', einddatum ='$einddatum', max_inschrijvingen ='$max_inschrijvingen', img ='$img'
        WHERE boekingsnummer = '$boekingsnummer'";

    if (mysqli_query($mysqli, $query)) {
        header('Location: ../index.php');
        echo "<p>Reis $titel is aangepast.</p>";
    } else {
        echo "<p>FOUT bij aanpassen Reis met boekingsnummer $boekingsnummer.</p>";
        echo mysqli_error($mysqli);
    }
} else {
    echo "<p>Geen gegevens ontvangen...</p>";
}
echo "<p><a href='../index.php'>TERUG</a> naar overzicht</p>";

?>
