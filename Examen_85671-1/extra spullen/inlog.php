<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign in</title>
</head>
<body>

<div class="main">
    <p class="sign" align="center">Sign in</p>
    <form class="form1" method="post" action="inlog_verwerk.php">
        <input class="un" type="text" align="center" id="gebruikersnaamVeld" name="Gebruikersnaam" placeholder="Username">
        <input class="pass" type="password" align="center" name="Wachtwoord" id="wachtwoordVeld" placeholder="Password">
        <input type="submit" class="submit" id="inlog" name="inlog" align="center" value="Sign in">
        <p class="forgot" align="center"><a href="../register/reg_blog.php">Registreren</p>
    </form>
</div>
</body>
</html>
