<?php 
    include '../database/connect-db.php';

    // SAVING the data of the form - handled by "registration-inc.php"
    include '../database/registration-inc.php';
    echo $firstname;
    echo $lastname;
    echo $promo;
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
        <form class="formb" action="" method="post">
            <div class="label">
                    <label for="">Email</label>
                    <input placeholder="Ingrese su correo electronico" class="input" type="email" name="email" id="name" required><span class="barra"></span>
            </div>
    
            <div class="label">
                    <label for="">Contraseña</label>
                    <div class="campo">
                        <input placeholder="Ingrese una contraseña" class="input" type="password" name="contraseña" id="pass" required=""><span class="showp">Mostrar</span><span class="barra"></span>
                    </div>                        
            </div>
    
            <div class="label">
                    <label for="">Confirmar</label>
                    <div class="campo">
                        <input placeholder="Confirmar su contraseña" class="input" type="password" name="contraseña2" id="pass2" required=""><span class="showp">Mostrar</span><span class="barra"></span>
                    </div>
                </div>
                <input class="button textcenter" name="next" type="submit" value="Siguiente">

        </form>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../resources/scripts/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>