<!DOCTYPE html>
<?php
session_start();
require_once '../database/giverapp-functions.php';


foreach ($_SESSION['user_data'] as $key => $value) {
  $user_id    =   $value['id'];
  $firstname  =   $value['firstname'];
  $lastname   =   $value['lastname'];
  $promo      =   $value['promo'];
}
$user_object = new GiverAppFunctions;
$user_object->setUserId($user_id);
$user_object->get_user_data_by_id();

if (!isset($_SESSION['user_data'])) {
  header("location: ../index.php");
}

$nombre_de_pagina = "CUENTA | GIVER";
include_once '../includes/header-inc.php';
?>
<link rel="stylesheet" href="../resources/style/app.css">
<link rel="stylesheet" href="../resources/style/account.css">
</head>

<body>
  <div class="hidden message">
    <p>No compatible con este dispositivo.</p>
    <p>Abrir desde un móvil</p>
  </div>
  <main>
    <div class="profile">
      <a href="settings.php">
        <i class="fas fa-cog" id="icn"></i>
      </a>
      <div class="profile-img">
        <img src="../resources/img/Profile.png" alt="" />
      </div>
    </div>
    <div class="content">
      <div class="profile-content">
        <h3><?php echo $firstname . ' ' . $lastname; ?></h3>
        <p style="margin-bottom: -1em;margin-top: 0.2em; color: rgba(29, 26, 26, 0.582);">
          <?php echo $promo ?>
        </p>
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
  </main>
  <?php include "../includes/footer-inc.php" ?>
</body>

</html>