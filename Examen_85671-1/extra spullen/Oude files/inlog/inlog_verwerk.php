<?php
if (isset($_POST['inlog']))
{
    require '../register/config.php';

    $Gebruikersnaam = $_POST['Gebruikersnaam'];
    $Wachtwoord = sha1($_POST['Wachtwoord']);
    $opdracht = "SELECT * FROM inlog_gegevens WHERE Gebruikersnaam = '$Gebruikersnaam' AND Wachtwoord = '$Wachtwoord'";

    $resultaat = mysqli_query($mysqli, $opdracht);

    if(mysqli_num_rows($resultaat) > 0)
    {
        session_start();
        $user = mysqli_fetch_array($resultaat);
        $_SESSION['Gebruikersnaam'] = $user['Gebruikersnaam'];
        $_SESSION['Level'] = $user['Level'];
        echo "<p>Hallo $Gebruikersnaam, u bent ingelogd</p>";
        echo "<p><a href='../Home/index.php'>Ga verder</a></p>";
    }
    else
    {
        echo "<p>Naam en/of wachtwoord zijn onjuist</p>";
        echo "<p><a href='inlog.php'>Probeer opnieuw</a></p>";
    }
}
?>