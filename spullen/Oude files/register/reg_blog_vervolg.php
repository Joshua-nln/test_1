<?php
//controleer of er een formulier is gestuurd
require 'config.php';


if (isset($_POST['Submit']))
{
    $response = $_POST["g-recaptcha-response"];

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6Lf-zDUaAAAAAFubbbzewULbBQBj9yOSQ7DFOv6H',
        'response' => $_POST["g-recaptcha-response"]
    );
    $options = array(
        'http' => array (
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success=json_decode($verify);

    if ($captcha_success->success==false) {
        echo "<p>Je bent een bot! ga weg!</p>";
    } else if ($captcha_success->success==true) {
        echo "<p>jij bent geen bot, ga maar door!</p>";
        //lees gegevens uit
        $naam = $_POST['Gebruikersnaam'];
        $ww = $_POST['Wachtwoord'];
        //ww encripten
        $ww2 = sha1($ww);

        //query uitvoeren
        $query = "INSERT INTO inlog_gegevens (`ID`, `Gebruikersnaam`, `Wachtwoord`, `Level`) VALUES (NULL, '$naam', '$ww2', '1')";
        $result = mysqli_query($mysqli, $query);

        if ($result)
        {
            echo "u bent geregistreerd $naam<br>";
            echo "<a href='../inlog/inlog.php'>Inloggen</a>";
        }
        else
        {
            echo "Fout, probeer opnieuw";
        }
    }
    else
    {
        echo "Er is iets fout gegaan<br>";
    }

}
?>

