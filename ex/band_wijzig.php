<style type="text/css">
    
body {
  color: #3366cc;
  align-items: center;
background-color: #15172b;
 /* display: flex;*/
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
require 'session.php';
require 'config.php';


$ReisID = $_GET['id'];
$query = "SELECT * FROM reizen WHERE ReisID = '$ReisID'";
$resultaat = mysqli_query($mysqli, $query);
if (mysqli_num_rows($resultaat) == 0)

{
    echo "<p>Er is geen band met ID $ReisID.</p>";
} else {



    $rij = mysqli_fetch_array($resultaat);

    ?>

<center>
    <form name="form1" method="POST" action="band_wijzig_verwerk.php" class="form">
      <div class="title">Wijzig reis</div>
      <div class="input-container ic1">
        <input type="number" name="ReisID" value="<?php echo $rij['ReisID'] ?>" readonly  class="input">
        <div class="cut"></div>
        <label for="ID" class="placeholder">ID</label>
      </div>
      <div class="input-container ic2">
        <input type="text" name="Titel" value="<?php echo $rij['Titel'] ?>" class="input">
        <div class="cut"></div>
        <label for="Titel" class="placeholder">Titel</label>
      </div>
<div class="input-container ic2">
        <input type="text" name="Bestemming" value="<?php echo $rij['Bestemming'] ?>" class="input">
        <div class="cut"></div>
        <label for="Bestemming" class="placeholder">Bestemming</label>
      </div>
      <div class="input-container ic2">
        <input type="text" name="Omschrijving" value="<?php echo $rij['Omschrijving'] ?>" class="input">
        <div class="cut cut-short"></div>
        <label for="Omschrijving" class="placeholder">Omschrijving</label>
      </div>
      <div class="input-container ic2">
        <input type="date" name="BeginDatum" value="<?php echo $rij['BeginDatum'] ?>"  class="input">
        <div class="cut cut-short"></div>
        <label for="BeginDatum" class="placeholder">BeginDatum</label>
      </div>
      <div class="input-container ic2">
        <input type="date" name="EindDatum" value="<?php echo $rij['EindDatum'] ?>" class="input">
        <div class="cut cut-short"></div>
        <label for="EindDatum" class="placeholder">EindDatum</label>
      </div>
      <div class="input-container ic2">
        <input type="number" name="MaxInschrijving" value="<?php echo $rij['MaxInschrijving'] ?>" class="input">
        <div class="cut cut-short"></div>
        <label for="MaxInschrijving" class="placeholder">MaxInschrijving</label>
      </div>
      <input type="submit" name="submit" value="Wijzig" class="submit">
</form>
</center>
    <?php

}

?>
