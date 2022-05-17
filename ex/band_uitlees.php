<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<style type="text/css">
    
body {
    color: #3366cc;
  align-items: center;
background-color: #15172b;
/*  display: flex;*/
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

require 'config.php';

$query = "SELECT * FROM reizen";

$resultaat = mysqli_query($mysqli, $query);

if (mysqli_num_rows($resultaat) == 0)
{
    echo "<center><h2>er zijn geen bands gevonden</h2></center>";
}
else {
    echo "<center>";
    echo "<table border='1'>";


    while ($rij = mysqli_fetch_array($resultaat)) {
        echo "<tr>";
        echo "<td>" . $rij['Titel'] . "</td>";
        echo "<td>" .  $rij['Bestemming'] . "</td>";
        echo "<td> <a href='band_detail.php?id=".$rij['ReisID']."'>Details</a> </td>";
        echo "<td> <a href='band_wijzig.php?id=".$rij['ReisID']."'>Wijzig</a> </td>";
        echo "<td> <a href='band_verwijder.php?id=".$rij['ReisID']."'>Verwijder</a> </td>";
        echo "</tr>";

    }
    echo "</table>";
    echo "<center>";
}
echo "<center><h3><a href='band_toevoeg.php'>Voeg een band toe</a></h3></center>";
echo "<center><h3><a href='uitlog.php'>UITLOGGEN</a></h3></center>";


?>