<?php
if (isset($_POST['inlog']))
{
   require '../config.php';
   session_start();

   $studentnummer = $_POST['studentnummer'];
   $wachtwoord = sha1($_POST['wachtwoord']);

   $opdracht = "SELECT * FROM users WHERE studentnummer = '$studentnummer' AND wachtwoord = '$wachtwoord'";

   $resultaat = mysqli_query($mysqli, $opdracht);

   if(mysqli_num_rows($resultaat) == 1)
   {
     session_start();
     //sla de username op in de sessie
     $_SESSION['studentnummer'] = $studentnummer;
     //stuur door naar de homepage
     header("Location:../index.php");
   }
   else
   {
       echo "<p>Naam en/of wachtwoord zijn onjuist</p>";
       echo "<p><a href='inlog.php'>Probeer opnieuw</a></p>";
   }
}
?>
