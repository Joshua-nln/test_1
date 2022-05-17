<?php
session_start();

if(!isset($_SESSION['Gebruikersnaam']))
{
    header("location:band_inlog.php");
}
else
{
    echo "<p>Welkom, " . $_SESSION['Gebruikersnaam'] . "</p>";

    if ($_SESSION['Level'] == 1)
    {
        echo "<p>U heeft geen rechten om deze pagina te bekijken.</p>";
        echo "<p><a href='band_uitlees.php'>Ga terug</a></p>";
        exit();
    }
}

?>