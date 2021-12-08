<?php 
    include '../database/connect-db.php';
    session_start();
    // SAVING the data of the form - handled by "registration-inc.php"
    
        
    // Store the submitted data sent
    // via POST method, stored 
    
    // Temporarily in $_POST structure.
    $_SESSION['firstname'] = $_POST['first_name'];
    $_SESSION['lastname']  = $_POST['last_name'];
    $_SESSION['promo']     = $_POST['promo'];
            

?>
<!-- HTML de la 2da sección de registro -->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/meta-inc.php" ?>
    <link rel="stylesheet" href="../resources/style/mainInicio.css">
    <link rel="stylesheet" href="../resources/style/r2.css">
    <title>Registro</title>
</head>
<body>
    <p class="hidden message">_No compatible con este dispositivo.</p>

    <div class="content">
        <div class="center title">
            <h1>Registro</h1>
        </div>
        <form class="formb" action="./Registro3.php" method="post">
            <div class="label">
                    <label>Email</label>
                    <input placeholder="Ingrese su correo electronico" class="input" type="email" name="email" id="name" required><span class="barra"></span>
            </div>
    
            <div class="label">
                    <label>Contraseña</label>
                    <div class="campo">
                        <input placeholder="Ingrese una contraseña" class="input" type="password" name="user_pwd" id="pass" required><span class="showp">Mostrar</span><span class="barra"></span>
                    </div>                        
            </div>
    
            <div class="label">
                    <label  >Confirmar</label>
                    <div class="campo">
                        <input placeholder="Confirmar su contraseña" class="input" type="password" name="user_pwd2" id="pass2" required=""><span class="showp">Mostrar</span><span class="barra"></span>
                    </div>
                </div>
                <input class="button textcenter" name="next2" type="submit" value="Siguiente">

        </form>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../resources/scripts/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>