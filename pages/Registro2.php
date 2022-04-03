<!DOCTYPE html>
<?php 
    // include '../database/database-connection.php';

use Symfony\Component\Routing\RequestContextAwareInterface;

    session_start();
    // SAVING the data of the form - handled by "registration-inc.php"
    /**
    * CHECK THE UNIQUE TOKEN
    */
    $token = filter_input(INPUT_POST, 'authenticate', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!$token || $token !== $_SESSION['secret_token']) {
        // return the person back, we're having a CSRF ATTACK!!
        header('Location: ./welcome.php?error=authenticate');
    } else {

        // Store the submitted data sent
        // via POST method, stored 
        
        // Temporarily in $_POST structure.
        $_SESSION['firstname'] = $_POST['first_name'];
        $_SESSION['lastname']  = $_POST['last_name'];
        $_SESSION['promo']     = $_POST['promo'];
    }
        
            

?>
<!-- HTML de la 2da sección de registro -->
<?php
    $nombre_de_pagina = "Registro | GIVER";
    include '../includes/header-login-register.php' ?>
</head>
<body>
    <div class="hidden message">
        <p>No compatible con este dispositivo.</p>
        <p>Abrir desde un móvil</p>
    </div>
    <main>
        <div class="content">
            <h1 class="content-title">Registro</h1>
            <div class="content-body">
                <form id="form" class="form" action="<?php echo htmlspecialchars("./Registro3.php"); ?>" method="post">
                <input type="hidden" name="authenticate" value="<?php echo $_SESSION['secret_token'] ?? '' ?>">
                    <div class="form-body">
                        <div class="form-box">
                            <label for="email">Email</label>
                            <input 
                            placeholder="Ingrese su correo" 
                            class="form-input" 
                            type="email" 
                            name="email" 
                            id="name" >
                        </div>
            
                        <div class="form-box">
                            <label for="user_pwd">Contraseña</label>
                                <input 
                                placeholder="Ingrese su contraseña" 
                                class="form-input show-password"
                                id="password" 
                                type="password"
                                name="user_pwd" 
                                autocomplete="current-password">
                                <ion-icon class="form-eye-icon" name="eye-outline"></ion-icon> <!-- EYE OPEN -->
                                <ion-icon style="display:none;" class="form-eye-icon" name="eye-off-outline"></ion-icon> <!-- EYE CLOSED -->
                        </div>
            
                        <div class="form-box">
                            <label for="confirm_password">Confirmar Contraseña</label>
                                <input 
                                placeholder="Confirmar contraseña" 
                                class="form-input show-password" 
                                type="password" 
                                id="confirm_password"
                                name="confirm_password" 
                                autocomplete="current-password">
                                <ion-icon class="form-eye-icon" name="eye-outline"></ion-icon> <!-- EYE OPEN -->
                                <ion-icon style="display:none;" class="form-eye-icon" name="eye-off-outline"></ion-icon> <!-- EYE CLOSED -->

                        </div>
                    </div>
                    <button class="buttons-comp" type="submit" name="next2">Siguiente</button>
                </form>
            </div>
        </div>
        <div class="btn-goback"><a href="./Registro.php"><ion-icon class="icon" name="caret-back-outline"></ion-icon></a></div>
    </main>
      
    <?php include "../includes/footer-login-register.php" ?>
    <script>
        $(document).ready(function() {
            var password1 = $('#password');
            var password2 = $('#confirm_password');
            var btn       = $('.form-eye-icon');
            
            $(btn).click(function() {
                $(btn).toggle();
                $(".show-password").attr('type', function(index, attr){
                    return attr == "password" ? "text" : "password";
                });
            })
        })
    </script>
</body>
</html>