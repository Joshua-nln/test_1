<?php
//controleer of er een formulier is gestuurd
require 'config.php';

error_reporting(0);
ini_set('display_errors', 1);

if (isset($_POST['Submit']))
{
    $response = $_POST["g-recaptcha-response"];

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6LeVG-ofAAAAAFZ8Ru6yhq_uIi3R-0OwOSbWPnBF',
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
    }
    else if ($captcha_success->success==true)
    {
        //lees gegevens uit
        $naam = $_POST['Gebruikersnaam'];
        $ww = $_POST['Wachtwoord'];
        $email = $_POST['Email'];
        $level = 1;
        //wachtwoord encripten
        $ww2 = sha1($ww);

        //prepared statements
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          if ($stmt = $mysqli->prepare('INSERT INTO users (`Gebruikersnaam`, `Wachtwoord`, `Email`, `Level`) VALUES (?,?,?,?)')) {
          $stmt->bind_param('sssi', $naam, $ww2, $email, $level);
          $stmt->execute();
          echo "LESGOOO je bent aangemeld!";
          echo "Klik <a href='inlog.php'>hier</a> om in te loggen!";
        }
        else
        {
          echo "er is iets fout gegaan!";
        }
      }
        else
        {
          echo 'Er iets is fout gegaan!';

        }
    }
    else
    {
        echo "Er is iets fout gegaan!<br>";
    }

}
?>
