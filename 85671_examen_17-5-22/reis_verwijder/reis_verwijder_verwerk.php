<?php
require '../config.php';
require_once '../session.inc.php';

if (isset($_POST['submit']))
{
    $boekingsnummer = $_POST['boekingsnummer'];


    $query = "DELETE FROM reizen WHERE boekingsnummer = $boekingsnummer";

    if(mysqli_query($mysqli, $query))
    {
        header('Location: ../index.php');
        echo "<p>Band $boekingsnummer is verwijderd!</p>";
    }
    else
    {
        echo "<p>FOUT bij verwijderen van $boekingsnummer.</p>";
        echo mysqli_error($mysqli);
    }
}
else
{
    echo "<p>Geen gegevens ontvangen...</p>";

}

echo "<p><a href='../index.php'>TERUG</a> naar Home</p>";




?>
