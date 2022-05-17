<?php
session_start();
//heeft jasper gemaakt
require '../register/config.php';

$query = "SELECT * FROM Home";

$resultaat = mysqli_query($mysqli, $query);

if (mysqli_num_rows($resultaat) == 0)
{
    echo "<p>Er zijn geen resultaat gevonden.</p>";
}

?>

<!-- HTML van Joshua -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <header>
        <a href="index.php"><button class="header_button" type="button" name="button">Home</button></a>
        <a href="../blog/blog.php"><button class="header_button" type="button" name="button">Blogs</button></a>
        <a href="../BLOG_FILES_PER_LID/Jelle/profiel.php"><button class="header_button" type="button" name="button">Eigen post</button></a>
        <a class="a_login" href="../inlog/inlog.php">Login</a>
      </header>

      <div class="sidebar_right">
        <h1>Be free en post je blog!</h1>
        <img src="../img/thumb.png" alt="">
      </div>
      <?php
      //heeft jasper gemaakt
      while ($rij = mysqli_fetch_array($resultaat))
      {
          echo "<div class='post1'>";
          echo "<p class='sign' align='center'>" . $rij['Titel'] . "</p>";
          echo "<p style='font-size: 20px; margin-left: 10px'>" . $rij['Text'] . "</p>";
          if(!isset($rij['Image']) || strlen($rij['Image']) == 0){
              echo "";
          }else{
              echo "<img src='../blog/" . $rij['Image'] . "' width='200px' />";
          }
          if(!isset($rij['Video']) || strlen($rij['Video']) == 0){
              echo "";
          }else{
              echo "<video width=\"320\" height=\"240\" controls><source src=../blog/" . $rij['Video'] . " type=\"video/mp4\"></video>";
          }
          if (!isset($_SESSION['Gebruikersnaam']) || strlen($_SESSION['Gebruikersnaam']) == 0)
          {
              echo "";
          }else if ($_SESSION['Gebruikersnaam'] == "Admin"){
              echo "<td><a href='wijzig.php?id=" . $rij['ID'] . "'>Wijzigen </a></td>";
              echo "<td><a href='verwijder.php?id=" . $rij['ID'] . "'> Verwijder</a></td>";
          }
          echo "</div>";
      }
      ?>
  </body>
</html>
