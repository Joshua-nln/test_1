<?php
  require '../config.php';
  require_once '../session.inc.php';


  $query = "SELECT level FROM users";

  $resultaat = mysqli_query($mysqli, $query);

  if (mysqli_num_rows($resultaat) == 0)
  {
      echo "<p>Er zijn geen resultaat gevonden.</p>";
  }
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
      <a href="#" class="home_button">Home</a>
      <?php
          $studentnummer = $_SESSION['studentnummer'];
          $result = mysqli_query($mysqli, "SELECT * FROM users WHERE studentnummer = $studentnummer");
          $row = mysqli_fetch_array($result);
          if($row['level'] == 2) {
            echo "<p class='login_buton'>Admin</p>";
            echo "<a href='../destroy_session.php' class='log_uit'>Log Uit</a>";
            echo "<a href='../reis_toevoeg/reis_toevoeg.php' class='login_buton'>Voeg toe</a>";
          }
          if($row['level'] == 1) {
            echo "<p class='login_buton'>neef</p>";
            echo "<a href='../destroy_session.php' class='log_uit'>Log Uit</a>";
          }
          ?>
    </header>
    <?php
    $boekingsnummer = $_GET['id'];
    $query = "SELECT * FROM reizen WHERE boekingsnummer = '$boekingsnummer'";
    $resultaat = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($resultaat) == 0)

    {
        echo "<p>Er is geen band met boekingsnummer $boekingsnummer.</p>";
    } else {
        $rij = mysqli_fetch_array($resultaat);
        ?>

    <center>
        <form name="form1" method="POST" action="reis_wijzig_verwerk.php" class="form">
          <div class="title">Wijzig reis</div>
          <div class="">
            <input type="hidden" name="boekingsnummer" value="<?php echo $rij['boekingsnummer'] ?>" readonly  class="input">
            <div class="cut"></div>
            <label for="ID" class="placeholder">boekingsnummer</label>
          </div>
          <div class="">
            <label for="titel" class="placeholder">titel</label><br>
            <input type="text" name="titel" value="<?php echo $rij['titel'] ?>" class="input">
            <div class=""></div>
          </div>
          <div class="">
            <label for="bestemming" class="placeholder">bestemming</label><br>
            <input type="text" name="bestemming" value="<?php echo $rij['bestemming'] ?>" class="input">
            <div class=""></div>
          </div>
          <div class="">
            <label for="omschrijving" class="placeholder">omschrijving</label><br>
            <input type="text" name="omschrijving" value="<?php echo $rij['omschrijving'] ?>" class="input">
            <div class=""></div>
          </div>
          <div class="">
            <label for="begindatum" class="placeholder">beginDatum</label><br>
            <input type="date" name="begindatum" value="<?php echo $rij['begindatum'] ?>"  class="input">
            <div class=""></div>
          </div>
          <div class="">
            <label for="einddatum" class="placeholder">einddatum</label><br>
            <input type="date" name="einddatum" value="<?php echo $rij['einddatum'] ?>" class="input">
            <div class=""></div>
          </div>
          <div class="">
            <label for="max_inschrijvingen" class="placeholder">max_inschrijvingen</label><br>
            <input type="number" name="max_inschrijvingen" value="<?php echo $rij['max_inschrijvingen'] ?>" class="input">
            <div class=""></div>
          </div>
          <input type="submit" name="submit" value="Wijzig" class="submit">
    </form>
    </center>
        <?php

    }

    ?>
  </body>
</html>
