<?php 
    include("connection.php");
    //Login
    if (!empty($_POST)) {
        $_correo = mysqli_real_escape_string($conexion,$_POST['email']);
        $_contraseña = mysqli_real_escape_string($conexion,$_POST['contraseña']);
        $sql = "SELECT user_id FROM users WHERE usuario = '$users'";
        $resultado = $conexion -> query ($sql);
        $rows= $resultado->num_rows;
        if ($rows > 0){
            $row=$resultado->fetch_assoc();
            $SESSION['email']=$row["user_id"];
            header("Location: phpmyadmin");
        }
            else{

             echo"<script>
                   alert('Usuario o contraseña incorrecta');
                   window.location= 'Registro.php'; 
            </script>"; 
        }
               
        }
        else{
            $sqlusuario = "INSERT INTO users (user_name, user_surname, user_password, user_email) VALUES ('$_correo', '$_contraseña')";
            $resultadousuario = $conexion -> query ($sqlusuario);
            if ($resultadousuario > 0) {
                echo"<script>
                   alert('Registro exitoso');
                   window.location= 'Registro.php'; 
            </script>"; 
            }
            else{
                echo"<script>
                alert('Error al registrarse');
                window.location= 'Registro.php'; 
         </script>"; 
            };

        };

    };
    //Registro
    if (isset($_POST["Confirmar"])) {
        $_correo = mysqli_real_escape_string($conexion,$_POST['email']);
        $_contraseña = mysqli_real_escape_string($conexion,$_POST['contraseña']);
        $sqluser = "SELECT user_id FROM users WHERE usuario = '$users'";
        $resultadouser = $conexion -> query ($sqluser);
        $filas= $resultadouser->num_rows;
        if ($filas > 0){
            echo"<script>
                   alert('El usuario ya existe');
                   window.location= 'Registro.php'; 
            </script>";       
        }
        else{
            $sqlusuario = "INSERT INTO users (user_name, user_surname, user_password, user_email) VALUES ('$_correo', '$_contraseña')";
            $resultadousuario = $conexion -> query ($sqlusuario);
            if ($resultadousuario > 0) {
                echo"<script>
                   alert('Registro exitoso');
                   window.location= 'Registro.php'; 
            </script>"; 
            }
            else{
                echo"<script>
                alert('Error al registrarse');
                window.location= 'Registro.php'; 
         </script>"; 
            }

        }

    }
?>
<!-- HTML de la 2da sección de registro -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <div class="campo 2">
                    <input placeholder="Confirmar su contraseña" class="input" type="password" name="contraseña2" id="pass2" required=""><span class="showp">Mostrar</span><span class="barra"></span>
                    </div>
                </div>
            <a href="Registro3.html">
                <div class="button">
                    <p class="textcenter">Siguiente</p>
                </div>
            </a>
        </form>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../resources/scripts/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>