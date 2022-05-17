<?php

if (isset($_POST['submit']))
{
    require '../config.php';

    $boekingsnummer = $_POST['boekingsnummer'];
    $titel = $_POST['titel'];
    $bestemming = $_POST['bestemming'];
    $omschrijving = $_POST['omschrijving'];
    $begindatum = $_POST['begindatum'];
    $einddatum = $_POST['einddatum'];
    $max_inschrijvingen = $_POST['max_inschrijvingen'];


    $query = "UPDATE reizen
    SET titel ='$titel', bestemming ='$bestemming', omschrijving = '$omschrijving',
             begindatum ='$begindatum', einddatum ='$einddatum', max_inschrijvingen ='$max_inschrijvingen'
        WHERE boekingsnummer = '$boekingsnummer'";


    if(mysqli_query($mysqli, $query))
    {
        header('Location: ../index.php');
        echo "<p>Reis $titel is aangepast.</p>";
    }
    else
    {
        echo "<p>FOUT bij aanpassen Reis met ID $boekingsnummer.</p>";
        echo mysqli_error($mysqli);
    }
}
else
{
    echo "<p>Geen gegevens ontvangen...</p>";

}

echo "<p><a href='band_uitlees.php'>TERUG</a> naar overzicht</p>";




?>
