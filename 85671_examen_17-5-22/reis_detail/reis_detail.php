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
  <title>index</title>
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
    echo "<a href='../destroy_session.php' class='log_uit'>Log Uit</a>";
    echo "<a href='../reis_toevoeg/reis_toevoeg.php' class='fix_header_button'>Voeg toe</a>";
}
if ($row['level'] == 1) {
    echo "<p class='user login_buton'>" . $_SESSION['studentnummer'] . "</p>";
    echo "<a href='../destroy_session.php' class='log_uit'>Log Uit</a>";
}
?>
   </header>
    <div class="rechter_box">
      <?php
//connect met de database
$query = "SELECT * FROM reizen";

$resultaat = mysqli_query($mysqli, $query);

$rij = mysqli_fetch_array($resultaat);

if (mysqli_num_rows($resultaat) == 0) {
    echo "<center><h2>er zijn geen reizen gevonden</h2></center>";
} else {
    echo "<center>";

    echo "<table border='1' class='reis_tabel'>";
    echo "<img src='../img/" . $rij['img'] . "' style='margin:0 25% -60% 0; border-radius:10px;' width='400px' />";
    echo "<tbody>";
    echo "<tr'>";
    echo "<td>Wat?: <p style='font-weight:bold;'>" . $rij['titel'] . "</p></td></tr>";
    echo "<tr><td>Waar?: <p style='font-weight:bold;'>" . $rij['bestemming'] . "</p></td></tr>";
    echo "<tr><td> <a href='../inschrijven/inschrijven.php?id=" . $rij['boekingsnummer'] . "'>inschrijven</a></td></tr>";
    echo "<tr><td> <a href='../uitschrijven/uitschrijven.php?id=" . $rij['boekingsnummer'] . "'>uitschrijven</a></td></tr>";
    if ($row['level'] == 2) {
        echo "<tr><td> <a href='reis_wijzig/reis_wijzig.php?id=" . $rij['boekingsnummer'] . "'>Wijzig</a></td></tr>";
        echo "<tr><td><a href='reis_verwijder/reis_verwijder.php?id=" . $rij['boekingsnummer'] . "'>Verwijder</a></td></tr><br><br><br>";
        echo "</tbody>";
    } else {
        echo "</tr>";

    }
    echo "</table>";
    echo "<center>";
}
?>
   </div>
  </div>
  </body>
</html>
