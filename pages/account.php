<?php
include '../database/connect-db.php';

session_start();
if (!isset($_SESSION['email'])) {
  header("location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../resources/style/account.css">
    <link rel="stylesheet" href="../resources/style/Hidden.css">
    <link rel="stylesheet" href="../resources/style/homestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  </head>
  <body>
    <p class="hidden message">_No compatible con este dispositivo.</p>
    <div class="profile">
      <a href="settings.php">
        <i class="fas fa-cog" id="icn"></i>
      </a>
      <div class="profile-img">
        <img src="../resources/img/Profile.png" alt="" />
      </div>
    </div>
    <div class="cnt">
      <div class="profile-content">
        <h3><?php $_SESSION["firstname"] . $_SESSION["lastname"] ?></h3> 
        <p style="margin-bottom: -1em;margin-top: 0.2em; color: rgba(29, 26, 26, 0.582);">Senior/Junior/Freshman/Alumn/Teacher</p>
        <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
      </div>
      <article class="mensaje">
        <div class="mensaje-img">
            <img src="../resources/img/Profile.png" alt="" /> 
        </div>
        <div class="text">
          <h3>Nombre y Apellido</h3>
          <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet.</p>
        </div>
      </article>
      <br />
      <article class="mensaje">
        <div class="mensaje-img">
          <img src="../resources/img/Profile.png" alt="" />
        </div>
        <div class="text">
          <h3>Nombre y Apellido</h3>
          <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet.</p>
        </div>
      </article>
      <br>
      <article class="mensaje">
        <div class="mensaje-img">
          <img src="../resources/img/Profile.png" alt="" />
        </div>
        <div class="text">
          <h3>Nombre y Apellido</h3>
          <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet.</p>
        </div>
      </article>
    </div>
    <?php include "../includes/footer-inc.php" ?>
  </body>
</html>