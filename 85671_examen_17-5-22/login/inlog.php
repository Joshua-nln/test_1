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
    <title>Log in</title>
  </head>
  <body>
    <header>
      <a href="#"><img src="../img/zon_logo.png" class="zon_logo float-left" alt="..."></a>
      <a href=""><h1 class="logo">GLRreizen</h1></a>
      <img src="../img/GLR.png" style="width:100px;" alt="">
      <a href="../index.php" class="home_button">Home</a>
      <a href="#" class="login_buton">Login</a>
    </header>
      <div class="mx-auto login_div">
        <p class="sign" align="center">Sign in</p>
          <form class="form1" method="post" action="inlog_verwerk.php">
            <input class="studentnummer loginveld" type="text" align="center" id="studentnummer" name="studentnummer" placeholder="Studentnummer:" required>
            <input class="wachtwoord loginveld" type="password" align="center" name="wachtwoord" id="wachtwoord" placeholder="Wachtwoord:" required>
            <input type="submit" class="submit" id="inlog" name="inlog" align="center" value="Sign in">
          </form>
      </div>
</body>
</html>
