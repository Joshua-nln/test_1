<?php
require '../config.php';
require '../session.inc.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!--Link de externe stylesheets-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
    <header>
      <a href="#"><img src="../img/zon_logo.png" class="zon_logo float-left" alt="..."></a>
      <a href=""><h1 class="logo">GLRreizen</h1></a>
      <a href="../index.php" class="home_button">Home</a>
      <?php
          $studentnummer = $_SESSION['studentnummer'];
          $result = mysqli_query($mysqli, "SELECT * FROM users WHERE studentnummer = $studentnummer");
          $row = mysqli_fetch_array($result);
          if($row['level'] == 2) {
            echo "<p class='login_buton'>Admin</p>";
            echo "<a href='../destroy_session.php' class='log_uit'>Log Uit</a>";
          }
          if($row['level'] == 1) {
            echo "<a href='' class='login_buton'>neef</a>";
            echo "<a href='../destroy_session.php' class='log_uit'>Log Uit</a>";
          }
          ?>
    </header>
    <form name="form1" method="post" action="reis_toevoeg_verwerk.php" class="form">
          <div class="title">Voeg een reis toe!</div>
          <div class="">
            <label for="titel" class="placeholder">Titel</label><br>
            <input name="titel" id="titel" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
          </div>
          <div class="">
            <label for="bestemming" class="placeholder">Bestemming</label><br>
            <input name="bestemming" id="bestemming" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
          </div>
          <div class="">
            <label for="omschrijving" class="placeholder">Omschrijving</label><br>
            <input name="omschrijving" id="omschrijving" class="input" type="text" placeholder=" " />
            <div class="cut cut-short"></div>
          </div>
          <div class="">
            <label for="begindatum" class="placeholder">BeginDatum</label><br>
            <input name="begindatum" id="begindatum" class="input" type="date" placeholder=" " />
            <div class="cut cut-short"></div>
          </div>
          <div class="">
            <label for="einddatum" class="placeholder">EindDatum</label><br>
            <input name="einddatum" id="einddatum" class="input" type="date" placeholder=" " />
            <div class="cut cut-short"></div>
          </div>
          <div class="">
            <label for="max_inschrijvingen" class="placeholder">MaxInschrijving</label><br>
            <input name="max_inschrijvingen" id="max_inschrijvingen" class="input" type="number" placeholder=" " />
            <div class="cut cut-short"></div>
          </div>
          <input type="submit" value="submit" class="submit">
    </form>
  </body>
</html>
