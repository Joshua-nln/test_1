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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

<div class="main">

    <h2 class="sign">Registreren</h2><br><br>

    <form action="register_verwerk.php" method="post" enctype="multipart/form-data" name="Regform">

        <input class="un" type="text" id="Gebruikersnaam" name="Gebruikersnaam" required placeholder="Gebruikersnaam in."><br><br>

        <input class="pass" type="password" id="Wachtwoord" name="Wachtwoord" required placeholder="Wachtwoord in."><br><br>

        <input class="email" type="email" id="Email" name="Email" required placeholder="Email in."><br><br>

        <div class="captcha_wrapper">
            <div class="g-recaptcha" data-sitekey="6LeVG-ofAAAAADlwuUHiuxwNzpSrQJI29f5meGhn"></div>
        </div>
        <br><br>

        <button class="submit" name="Submit" id="Submit">Registreer</button><br><br>

        <div class="forgot"><a  href='../inlog/inlog.php'>Terug naar inloggen</a></div>
        <div class="forgot"><a  href='../Home/index.php'>Terug naar home</a></div>

    </form>

</div>

</body>
</html>
