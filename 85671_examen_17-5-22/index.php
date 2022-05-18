<?php
require 'config.php';
require_once 'session.inc.php';

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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>index</title>
  </head>
  <body>
    <!--Een alegemene Header met logo en buttons voor alle pagina's-->
    <header>
      <a href="#"><img src="img/zon_logo.png" class="zon_logo float-left" alt="..."></a>
      <a href=""><h1 class="logo">GLRreizen</h1></a>
      <img src="img/GLR.png" style="width:100px;" alt="">
      <a href="#" class="home_button">Home</a>
      <?php
//Maak de permissie functie met een level systeem
$studentnummer = $_SESSION['studentnummer'];
$result        = mysqli_query($mysqli, "SELECT * FROM users WHERE studentnummer = $studentnummer");
$row           = mysqli_fetch_array($result);
if ($row['level'] == 2) {
    echo "<p class='user login_buton'>Admin</p>";
    echo "<a href='destroy_session.php' class='log_uit'>Log Uit</a>";
    echo "<a href='reis_toevoeg/reis_toevoeg.php' class='fix_header_button'>Voeg toe</a>";
}
if ($row['level'] == 1) {
    echo "<p class='user login_buton'>" . $_SESSION['studentnummer'] . "</p>";
    echo "<a href='destroy_session.php' class='log_uit'>Log Uit</a>";
}
?>

    </header>

    <div id="main">
      <div class="linker_box">
        <h1>Welkom op het GLR ReisBureau!</h1><br>
        <h2>Meld je hier aan voor krankzinnige Reisjes!</h2><br><br><br>
        <h2>Druk hier voor FAQ!</h2>
        <button type="button" style="font-size:2em;" class="btn btn-outline-primary">FAQ</button>
      </div>
      <div class="rechter_box">
        <?php
//connect met de darijase
require 'config.php';

$query = "SELECT * FROM reizen";

$resultaat = mysqli_query($mysqli, $query);

if (mysqli_num_rows($resultaat) == 0) {
    echo "<center><h2>er zijn geen reizen gevonden</h2></center>";
} else {
    echo "<center>";
    //Maak tabellen met alle data uit de database
    while ($rij = mysqli_fetch_array($resultaat)) {
?>
              <table border='1' class='index_tabel reis_tabel'>
               <img src="img/<?php
        echo $rij['img'];
?>" style="width:400px; margin:0px 0px -500px -155px; border-radius:10px;">
                 <tbody>
                   <tr><?php
        echo "<td>Wat?: <p style='font-weight:bold;'>" . $rij['titel'] . "</p></td></tr>";
        echo "<tr><td>Waar?: <p style='font-weight:bold;'>" . $rij['bestemming'] . "</p></td></tr>";
        echo "<tr><td> <a href='reis_detail/reis_detail.php?id=" . $rij['boekingsnummer'] . "'>Details</a></td></tr>";
        if ($row['level'] == 2) {
            echo "<tr><td> <a href='reis_wijzig/reis_wijzig.php?id=" . $rij['boekingsnummer'] . "'>Wijzig</a></td></tr>";
            echo "<tr><td><a href='reis_verwijder/reis_verwijder.php?id=" . $rij['boekingsnummer'] . "'>Verwijder</a></td></tr><br><br><br>";
            echo "</tbody>";
        }
        echo "</tr>";

    }
    echo "</table>";
    echo "<center>";
}
?>
     </div>
    </div>

    <footer>

    </footer>
  </body>
</html>
