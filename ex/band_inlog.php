<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier</title>
    <link rel="stylesheet" href="band_inlog.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>

<style type="text/css">
    
body {
  color: #3366cc;
  align-items: center;
background-color: #15172b;
  display: flex;
  justify-content: center;
  height: 100vh;
}

.form {
  background-color: #15172b;
  border-radius: 20px;
  box-sizing: border-box;
  height: 650px;
  padding: 20px;
  width: 320px;
}

.title {
  color: #eee;
  font-family: sans-serif;
  font-size: 36px;
  font-weight: 600;
  margin-top: 30px;
}

.subtitle {
  color: #eee;
  font-family: sans-serif;
  font-size: 16px;
  font-weight: 600;
  margin-top: 10px;
}

.input-container {
  height: 50px;
  position: relative;
  width: 100%;
}

.ic1 {
  margin-top: 40px;
}

.ic2 {
  margin-top: 30px;
}

.input {
  background-color: #303245;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  font-size: 18px;
  height: 100%;
  outline: 0;
  padding: 4px 20px 0;
  width: 100%;
}

.cut {
  background-color: #15172b;
  border-radius: 10px;
  height: 20px;
  left: 20px;
  position: absolute;
  top: -20px;
  transform: translateY(0);
  transition: transform 200ms;
  width: 76px;
}

.cut-short {
  width: 50px;
}

.input:focus ~ .cut,
.input:not(:placeholder-shown) ~ .cut {
  transform: translateY(8px);
}

.placeholder {
  color: #65657b;
  font-family: sans-serif;
  left: 20px;
  line-height: 14px;
  pointer-events: none;
  position: absolute;
  transform-origin: 0 50%;
  transition: transform 200ms, color 200ms;
  top: 20px;
}

.input:focus ~ .placeholder,
.input:not(:placeholder-shown) ~ .placeholder {
  transform: translateY(-30px) translateX(10px) scale(0.75);
}

.input:not(:placeholder-shown) ~ .placeholder {
  color: #808097;
}

.input:focus ~ .placeholder {
  color: #dc2f55;
}

.submit {
  background-color: #08d;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  cursor: pointer;
  font-size: 18px;
  height: 50px;
  margin-top: 38px;
  // outline: 0;
  text-align: center;
  width: 100%;
}

.submit:active {
  background-color: #06b;
}

a{
    color:white;
    text-decoration: none;
}



</style>

<?php

if (isset($_POST['inlog']))
{
    require 'config.php';

    $Gebruikersnaam = $_POST['Gebruikersnaam'];
    $Wachtwoord = sha1($_POST['Wachtwoord']);
    $opdracht = "SELECT * FROM `Studenten` WHERE `Voornaam` = '$Gebruikersnaam' AND `Wachtwoord` = '$Wachtwoord'";
    $opdr = "SELECT * FROM `Admin_Gebruikers` WHERE `Naam` = '$Gebruikersnaam' AND `Wachtwoord` = '$Wachtwoord'";

    $resultaat = mysqli_query($mysqli, $opdracht);
    $result = mysqli_query($mysqli, $opdr);

    if(mysqli_num_rows($resultaat) > 0)
    {
        $user = mysqli_fetch_array($resultaat);
        $_SESSION['Gebruikersnaam'] = $user['Voornaam'];
        $_SESSION['Level'] = $user['Level'];
        echo "<center>";
        echo "<h2>Hallo $Gebruikersnaam, u bent ingelogd</h2><br>";
        echo "<h3><a href='band_uitlees.php'>Ga verder</a></h3>";
        echo "</center>";
    }
    elseif(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_array($result);
        $_SESSION['Gebruikersnaam'] = $user['Naam'];
        $_SESSION['Level'] = $user['Level'];
        echo "<center>";
        echo "<h2>Hallo $Gebruikersnaam, u bent ingelogd</h2><br>";
        echo "<h3><a href='band_uitlees.php'>Ga verder</a></h3>";
        echo "</center>";
    }else{
        echo "<h2>Naam en/of wachtwoord zijn onjuist</h2><br>";
        echo "<a href='band_inlog.php'>Probeer opnieuw</a>";
    }
}
else{
    ?>
<center>
    <div class="main">      
            <div class="login">
                <form method="POST" action="">
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="text" id="gebruikersnaamVeld" name="Gebruikersnaam" placeholder="Email" required="">
                    <input type="password" name="Wachtwoord" id="wachtwoordVeld" placeholder="Password" required="">
                    <input type="submit" name="inlog" value="LOG IN" class="btn">
                </form>
            </div>
    </div>
</center>
    <?php
}
?>
</body>
</html>