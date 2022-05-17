<?php
  require 'config.php';
  require_once 'session.inc.php';


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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
    <!--Header met logo en buttons naar Home en Inlog-->
    <header>
      <a href="#"><img src="img/zon_logo.png" class="zon_logo float-left" alt="..."></a>
      <a href=""><h1 class="logo">GLRreizen</h1></a>
      <a href="#" class="home_button">Home</a>
      <?php
          $studentnummer = $_SESSION['studentnummer'];
          $result = mysqli_query($mysqli, "SELECT * FROM users WHERE studentnummer = $studentnummer");
          $row = mysqli_fetch_array($result);
          if($row['level'] == 2) {
            echo "<p class='login_buton'>Admin</p>";
            echo "<a href='destroy_session.php' class='log_uit'>Log Uit</a>";
            echo "<a href='reis_toevoeg/reis_toevoeg.php' class='login_buton'>Voeg toe</a>";
          }
          if($row['level'] == 1) {
            echo "<p class='login_buton'>neef</p>";
            echo "<a href='destroy_session.php' class='log_uit'>Log Uit</a>";
          }
          ?>
    </header>

    <div id="main">
      <div class="linker_box"></div>
      <div class="rechter_box">
        <?php
        require 'config.php';

        $query = "SELECT * FROM reizen";

        $resultaat = mysqli_query($mysqli, $query);

        if (mysqli_num_rows($resultaat) == 0)
        {
            echo "<center><h2>er zijn geen reizen gevonden</h2></center>";
        }
        else {
            echo "<center>";
            echo "<table border='1'>";


            while ($rij = mysqli_fetch_array($resultaat)) {
                echo "<tr>";
                echo "<td>" . $rij['titel'] . "</td>";
                echo "<td>" .  $rij['bestemming'] . "</td>";
                echo "<td> <a href='band_detail.php?id=".$rij['boekingsnummer']."'>Details</a> </td>";
                echo "<td> <a href='reis_wijzig/reis_wijzig.php?id=".$rij['boekingsnummer']."'>Wijzig</a> </td>";
                echo "<td> <a href='reis_verwijder/reis_verwijder.php?id=".$rij['boekingsnummer']."'>Verwijder</a> </td>";
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
