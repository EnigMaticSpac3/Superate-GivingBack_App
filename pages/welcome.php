<?php 
session_start();
session_unset();
session_destroy();
?>
<!-- HTML del inicio de la app -->
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "../includes/meta-inc.php"; ?>
    <title>Inicio</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../resources/style/Index.css">
    <link rel="stylesheet" href="../resources/style/mainInicio.css">

    <!-- MANIFEST - MAKES THE PAGE AN APP -->
    <link rel="manifest" href="../manifest.json">

</head>
<body>
    
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-logo section-left"></div> <!-- This is the logo, a bit bug but.. works -->
        <div class="loader-section section-right"></div>

    </div>
    
    

    <p class="hidden message">_No compatible con este dispositivo.</p>

    <div id="content" class="content">
        <div class="center title">
            <h1>Bienvenido</h1>
        </div>
        <img class="img1" src="../resources/img/img2.png" alt="logo">
        <div class="center">
            <p>Ya tienes una cuenta? <a href="./inicio_de_sesion.html">Iniciar sesión</a></p>        
        </div>
        <br>
       
        <div class="center">
            <a href="./account.php">
                <input class="btn" type="submit"   value="Iniciar sesión con Microsoft"/>
            <a href="./Registro.php">
                <input class="btn2" type="submit"   value="Crear cuenta"/>
            </a>
        </div>
    </div>
        


    <!--====== Javascripts & Jquery ======-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
 
            setTimeout(function(){
                $('body').addClass('loaded');
            }, 3000);

        });
    </script>
    <script src="../resources/scripts/cookie.js"></script>
    
</body>
</html>