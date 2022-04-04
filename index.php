<!DOCTYPE html>

<?php 
    session_start();
    session_unset();
    session_destroy();

    // Add the name of the page inside << $nombre_de_pagina >> variable
    $nombre_de_pagina = "Welcome | GIVER" ; // page's name
    include "./includes/header-login-register.php"; 
?>
    <!-- MANIFEST - MAKES THE PAGE AN APP -->
    <link rel="manifest" href="./manifest.json">

</head>
<body>
    <div class="hidden message">
        <p>No compatible con este dispositivo.</p>
        <p>Abrir desde un móvil</p>
    </div>
    
    <div id="loader-wrapper">
        <div id="loader-centered">

            <div id="loader"></div>
            
            <div class="loader-section section-left"></div>
            <div class="loader-logo section-left"></div> <!-- This is the logo, a bit bug but.. works -->
            <div class="loader-section section-right"></div>
            
        </div>
    </div>
    <main>
        
        
        <div class="content">
            <h1 class="content-title">Bienvenido</h1>
            <div class="content-body">

                <img class="welcome-img" src="./resources/img/img2.png" alt="logo">
                
                <div class="welcome-buttons">
                    <a href="./inicio_de_sesion.php" class="buttons-comp">
                        Iniciar Sesión
                    <a href="./Registro.php" class="buttons-comp">
                        Crear Cuenta
                    </a>
                    <!-- <div class="add-to">
                        <button class="buttons-comp orange add-to-btn">Añadir App</button>
                    </div> -->
                    <a href="#" class="add-to buttons-comp">
                        Añadir App
                    </a>
                </div>
            </div>
        </div>
    </main>
        


    <!--====== Javascripts & Jquery ======-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function(){
                navigator.serviceWorker.register('../service-worker.js').then(function(
                    registration) {
                    console.log("Registration with scope: "
                    , registration.scope);
                }, function(err) {
                    console.log("Registration Failed: ", err);
                })
            })
        }

        $(document).ready(function() {
 
            setTimeout(function(){
                $('body').addClass('loaded');
            }, 3000);

        });
        
    </script>
    <script src="../resources/scripts/install-app.js"></script>
    
</body>
</html>