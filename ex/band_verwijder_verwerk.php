<?php

if (isset($_POST['submit']))
{
    require 'config.php';

    $ReisID = $_POST['ReisID'];


    $query = "DELETE FROM reizen WHERE ReisID = $ReisID";

    if(mysqli_query($mysqli, $query))
    {
        header('Location: band_uitlees.php');
        echo "<p>Band $ID is verwijderd!</p>";
    }
    else
    {
        echo "<p>FOUT bij verwijderen van $ID.</p>";
        echo mysqli_error($mysqli);
    }
}
else
{
    echo "<p>Geen gegevens ontvangen...</p>";

}

echo "<p><a href='band_uitlees.php'>TERUG</a> naar overzicht</p>";




?>