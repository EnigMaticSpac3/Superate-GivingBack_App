<?php
session_start();

if (!isset($_SESSION['userID'])) {
    session_unset();
    session_destroy();
    header("location: ./pages/welcome.php");
} else {
    echo "hola";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./includes/meta-inc.php" ?>
    <title>Home</title>
    <link rel="stylesheet" href="./resources/style/homestyles.css">
    <!-- MANIFEST - MAKES THE PAGE AN APP -->
    <link rel="manifest" href="../manifest.json">
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
            <h1><?php echo $_SESSION['user_email'] ?></h1>
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
        

<script>
    if ('serviceWorker' in navigator) {
            window.addEventListener('load', function(){
                navigator.serviceWorker.register('service-worker.js').then(function(
                    registratration) {
                    console.log("Registration with scope: "
                    , registratration.scope);
                }, function(err) {
                    console.log("Registration Failed: ", err);
                })
            })
        }
</script>
</body>
</html>