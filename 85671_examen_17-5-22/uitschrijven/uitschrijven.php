<?php
require '../config.php';
require_once '../session.inc.php';


$query = "SELECT level FROM users";

$resultaat = mysqli_query($mysqli, $query);

if (mysqli_num_rows($resultaat) == 0) {
    echo "<p>Er zijn geen resultaat gevonden.</p>";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link de externe stylesheets-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Reis verwijderen</title>
  </head>
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
    echo "<a href='destroy_session.php' class='log_uit'>Log Uit</a>";
    echo "<a href='reis_toevoeg/reis_toevoeg.php' class='login_buton'>Voeg toe</a>";
}
if ($row['level'] == 1) {
    echo "<p class='user login_buton'>" . $_SESSION['studentnummer'] . "</p>";
    echo "<a href='destroy_session.php' class='log_uit'>Log Uit</a>";
}
?>
   </header>
    <?php
//haal data vanuit de database op
$boekingsnummer = $_GET['id'];
$query          = "SELECT *  FROM inschrijvingen WHERE boekingsnummer = '$boekingsnummer'";
$resultaat      = mysqli_query($mysqli, $query);
if (mysqli_num_rows($resultaat) == 0) {
    echo "<p>Er is geen inschrijving met ID $boekingsnummer.</p>";
} else {

    $rij = mysqli_fetch_array($resultaat);
?>
   <center>
      <form name="form1" method="POST" action="uitschrijven_verwerk.php" class="form form_font">
          <div class="title">Uitschrijven</div>
          <input type="hidden" name="boekingsnummer" value="<?php
    echo $rij['boekingsnummer'];
?>">
          <div class="">
            <h2>Weet je zeker dat je hiervoor uit wilt schrijven?</h2>
          </div>
          <div class="">
            <label for="bestemming" class="placeholder">boekingsnummer</label>
           <input type="text" name="boekingsnummer" value="<?php
    echo $rij['boekingsnummer'];
?>" disabled class="input"></p>
          </div>

          <input type="submit" name="submit" value="Uitschrijven" class="submit">
      </form>

        <h3>terug naar <a href="../index.php">Home</a></h3>
    </center>
        <?php
}
?>
 </body>
</html>
