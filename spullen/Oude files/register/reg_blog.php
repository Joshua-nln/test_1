<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registreren</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" type="text/css" href="Css.css">
</head>
<body>

<div class="main">

    <h2 class="sign">Registreren</h2><br><br>

    <form action="reg_blog_vervolg.php" method="post" enctype="multipart/form-data" name="Regform">

        <input class="un" type="text" id="Gebruikersnaam" name="Gebruikersnaam" required placeholder="Vul hier je gewenste gebruikersnaam in."><br><br>

        <input class="pass" type="password" id="Wachtwoord" name="Wachtwoord" required placeholder="Vul hier je gewenste wachtwoord in."><br><br>

        <div class="captcha_wrapper">
            <div class="g-recaptcha" data-sitekey="6Lf-zDUaAAAAAFcSiJatwAuQirUyLp4ITPXabBkA"></div>
        </div>
        <br><br>

        <button class="submit" name="Submit" id="Submit">Registreer</button><br><br>

        <div class="forgot"><a  href='../inlog/inlog.php'>Terug naar inloggen</a></div>
        <div class="forgot"><a  href='../Home/index.php'>Terug naar home</a></div>

    </form>

</div>

</body>
</html>
