<!DOCTYPE html>
<?php 
session_start();

// create $usertoken
require_once('../database/authenticate.php');


?>
<!-- HTML de la sección de iniciar sesión -->
<?php
    $nombre_de_pagina = "Iniciar de Sesión | GIVER";
    include '../includes/header-login-register.php' ?>
</head>

<body>
    <div class="hidden message">
        <p>No compatible con este dispositivo.</p>
        <p>Abrir desde un móvil</p>
    </div>


    <main>
        <div class="content">
            <h1 class="content-title">Inicio de Sesión</h1>
            <?php
                if (isset($error)) {
                    if ($error == 'Verify your credentials') {
                        echo '<div class="server-message">
                        <p>Verifica nuevamente el correo y la contraseña</p>
                        </div>';
                    }
                    if ($error === "This user doesn't exist. Register!") {
                        echo '<div class="server-message">
                        <p>Este Usuario no Existe. Registrate!</p>
                        </div>';
                    }
                }
            ?>
            <div class="content-body">
                <form action="<?php echo htmlspecialchars('../database/login-inc.php'); ?>" id="form" class="form" method="POST" autocomplete="off">
                <input type="hidden" name="authenticate" value="<?php echo $_SESSION['secret_token'] ?? '' ?>">
                <div class="form-body">
                        <div class="form-box">
                            <label for="email">Correo</label>
                            <input 
                            class="form-input" 
                            name="email" 
                            id="email"
                            type="text"
                            placeholder="Ingrese tu correo">
                        </div>
                    
                        <div class="form-box">
                            <label for="">Contraseña</label>
                            <input 
                            class="form-input" 
                            name="pwd" 
                            id="pwd"
                            type="password" 
                            placeholder="Ingrese su contraseña">
                        </div>
        
                        <div class="form-msg">
                            <p>¿No tienes una cuenta?</p>
                            <a  href="./Registro.php" class="">Crear Cuenta</a>
                        </div>
                    </div>
                    <button class="buttons-comp" type="submit" name="login">Iniciar sesión</button>
                </form>
            </div>
        </div>
        
        <div class="btn-goback"><a href="../index.php">
        <ion-icon class="icon" name="caret-back-outline"></ion-icon>
        </a></div>
    </main>

    <?php include '../includes/footer-login-register.php' ?>
</body>
</html>