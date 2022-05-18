<?php
require '../config.php';
require_once '../session.inc.php';

$id            = $_GET['id'];
$studentnummer = $_SESSION['studentnummer'];

//data ophalen van de database
$resultaat1 = mysqli_query($mysqli, "SELECT * FROM reizen WHERE boekingsnummer = $id");
$resultaat2 = mysqli_query($mysqli, "SELECT * FROM users WHERE studentnummer = $studentnummer");
$resultaat3 = mysqli_query($mysqli, "SELECT * FROM inschrijvingen WHERE boekingsnummer = $id");
$resultaat4 = mysqli_query($mysqli, "SELECT * FROM inschrijvingen WHERE studentnummer = $studentnummer");

$rij1 = mysqli_fetch_array($resultaat1);
$rij2 = mysqli_fetch_array($resultaat2);
$rij3 = mysqli_fetch_array($resultaat3);

?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="author" content="John Doe">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Link de externe stylesheets-->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>index</title>
</head>
<title>Schrijf in</title>
  <body>
    <header>
      <a href="#"><img src="../img/zon_logo.png" class="zon_logo float-left" alt="..."></a>
      <a href=""><h1 class="logo">GLRreizen</h1></a>
      <img src="../img/GLR.png" style="width:100px;" alt="">
      <a href="../index.php" class="home_button">Home</a>
      <?php
//Maak de permissie functie met een level systeem
$studentnummer = $_SESSION['studentnummer'];
$result        = mysqli_query($mysqli, "SELECT * FROM users WHERE studentnummer = $studentnummer");
$row           = mysqli_fetch_array($result);
if ($row['level'] == 2) {
    echo "<p class='user login_buton'>Admin</p>";
    echo "<a href='../destroy_session.php' class='log_uit'>Log Uit</a>";
    echo "<a href='../reis_toevoeg/reis_toevoeg.php' class='fix_header_button'>Voeg toe</a>";
}
if ($row['level'] == 1) {
    echo "<p class='user login_buton'>" . $_SESSION['studentnummer'] . "</p>";
    echo "<a href='../destroy_session.php' class='log_uit'>Log Uit</a>";
}
?>

    </header>
    <div id="home">
        <h1><?php
echo $rij1['bestemming'];
?> inschrijf formulier</h1>
          <h3 style="font-size:bold;"><?php
echo mysqli_num_rows($resultaat3);
?> van de <?php
echo $rij1['max_inschrijvingen'];
?> plekken bezet.</h3>
            <?php
if (mysqli_num_rows($resultaat4) < 1) {
    //controleer of de login correct was
    if (mysqli_num_rows($resultaat3) < $rij1['max_inschrijvingen']) {
?>
                 <form action="inschrijven_verwerk.php" method="post">
                    <input type="hidden" name="boekingsnummer" id="boekingsnummer" required="required" value="<?php
        echo $rij1['boekingsnummer'];
?>">
                    <input type="hidden" name="studentnummer" id="studentnummer" required="required" value="<?php
        echo $studentnummer;
?>">
                    <p>
                      <label>Voordat je ingeschrijft, heb je nog opmerkingen?</label>
                      <input type="text" name="opmerkingen" id="opmerkingen" value="">
                    </p>
                    <p>
                      <input type='submit' name='submit' id='submit' value='Opslaan'>
                      <button id='submit' onclick='history.back();return false;'>Annuleren</button>
                    </p>
                  </form>
          <?php
    } else {
?>
           <h1>Deze reis zit vol, kijk eventueel naar andere reizen!</h1>
            <button id='submit' onclick='history.back();return false;'>Ga Terug</button>
            <?php
    }
} else {
?>
           <h1>Je bent al ingeschreven voor een reis!</h1><br>
            <button id='submit' onclick='history.back();return false;'>Ga Terug</button>
            <?php
}
?>
     </div>
    </body>
  </html>
