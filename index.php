<?php
session_start();
session_unset();
session_destroy();

if (!isset($_SESSION['email'])) {
  header("location: ./pages/welcome.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../resources/style/Home.css">
</head>
<body>
    <div id="WelcomeDiv">
            <div id="loader-wrapper">
                <div id="loader"></div>

                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>

            </div>
    </div>

    <div class="Home-Inicio">
        <div class="Logo-Home">
            <img src="../resources/img/Profile.png" alt="">
            <h1><?php echo $_SESSION['email'] ?></h1>
            <p>This is the lastest for you.</p>
        </div>
    </div>
      
    <article class="Inicio-Home">
        <div class="mensaje-img">
          <img src="../resources/img/Profile.png" alt="" /> 
        </div>
        <div class="text">
          <h3>Nombre Apellido</h3>
          <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet.</p>
        </div>
      </article>

      <article class="mensaje">
          <div class="mensaje-img">
              <img src="../resources/img/Profile.png" alt="" /> 
          </div>
          <div class="text">
              <h3>Nombre Apellido</h3>
              <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet.</p>
          </div>
      </article>
        


</body>
</html>