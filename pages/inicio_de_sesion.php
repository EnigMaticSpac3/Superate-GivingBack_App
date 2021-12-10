<?php 
    if (isset($_POST['login'])) {

        require '../database/connect-db.php';
    
        $email = $_POST['email'];
        $pwd   = $_POST['pwd'];
        // $loc   = "location: ../pages/registration.php?error=stmtfailedemail";
        $loc   = "location: ../pages/inicio_de_sesion.php?error=stmtfailedemail";
        require '../database/functions.php';
        loginUser($conn, $email, $pwd, $loc);
}
?>
<!-- HTML de la sección de iniciar sesión -->
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include '../includes/meta-inc.php' ?>
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../resources./style./Index.css">
    <link rel="stylesheet" href="../resources/style/mainInicio.css">
    <link rel="stylesheet" href="../resources/style/Hidden.css">
</head>
<body>
    <p class="hidden message">_No compatible con este dispositivo.</p>

    <?php
    if (isset($_GET['error'])) {
      if ($_GET['error'] == 'wronglogin-userfalse' || $_GET['error'] == 'wronglogin-pwdfalse') {
        echo '<div class="server-message">
        <p>Verifica nuevamente el correo y la contraseña</p>
        </div>';
        }  
    }
    
    
    ?>
    <Div class="content">
        <div class="center title">
            <h1>Inicio de Sesión</h1>
        </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="formb" method="POST">
                <div>
                    <div class="label">
                        <label for="Name">Correo</label>
                        <input required class="input" name="email" type="text" placeholder="Ingrese tu correo">
                    </div>
                    <div class="label">
                        <label for="">Contraseña</label>
                        <input class="input" name="pwd" type="password" placeholder="Ingrese su contraseña">
                    </div>
                </div>
                <div>
                    <p class="inline">¿No tienes una cuenta?</p>
                    <a  href="./Registro.php" class="inline">Crear Cuenta</a>
                </div>
                <br>
                <button class="button2 textcenter" type="submit" name="login">Iniciar sesión</button>
            </form>
    </Div>
</body>
</html>