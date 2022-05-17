 <?php
if (isset($_POST['inlog']))
{
    require 'config.php';

    $Gebruikersnaam = $_POST['Gebruikersnaam'];
    $Wachtwoord = sha1($_POST['Wachtwoord']);
    $opdracht = "SELECT * FROM users WHERE Gebruikersnaam = '$Gebruikersnaam' AND Wachtwoord = '$Wachtwoord'";

    $resultaat = mysqli_query($mysqli, $opdracht);

    if(mysqli_num_rows($resultaat) > 0)
    {
        session_start();
        $user = mysqli_fetch_array($resultaat);
        $_SESSION['Gebruikersnaam'] = $user['Gebruikersnaam'];
        $_SESSION['Level'] = $user['Level'];
				header("Location:user.php");
    }
    else
    {
        echo "<p>Naam en/of wachtwoord zijn onjuist</p>";
        echo "<p><a href='inlog.php'>Probeer opnieuw</a></p>";
    }
}
?>
