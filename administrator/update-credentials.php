<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['user_data'])) {
    header('location: login.php');
}


if (isset($_POST['update'])) {
    require_once '../database/giverapp-functions.php';
    $user_object    = new GiverAppFunctions;
    foreach ($_SESSION['user_data'] as $key => $value) {
        $user_id  = $value['id'];
    }
    $user_object->setUserId($user_id);
    $user_data = $user_object->get_user_data_by_id();

    // Procedemos a cambiar la contraseña -facilita- a una HASHED (hasheada) que sea difícil de conseguir.
    $user_object->setUserPwd(password_hash($_POST['admin_pwd'], PASSWORD_ARGON2I));

    // Si se actualizó la contraseña, el mensaje lo guardamos en una variable
    
    if ($user_object->update_pwd()) {
        $info   = "¡Su contraseña ha sido Actualizada!";
        // UNSET el botón de 'update' y la sesión
        // Si la persona recarga la página no se anda actualizando la contraseña nuevamente. Solo 1 vez.
        // unset($_POST['update']);
        session_unset();
    } else {
        $error  = "Hubo un problema";
    }
}


?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GIVER Admin - Update</title>

    <link rel="shortcut icon" href="../resources/img/icons/giverlogo.ico" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary overflow-hidden">

    <div class="container mt-5">

    <?php 
    if(isset($error)) {
        ?>
        <div class="alert alert-danger">
            <?php print_r($error) ?>
        </div>
        <?php
    }
    ?>
    <?php 
    if(isset($info)) {
        ?>
        <div class="alert alert-success">
            <?php print_r($info) ?>
        </div>
        <?php
    }
    ?>
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg ">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 ">Actualice su contraseña</h1>
                                    </div>
                                    
                                    <form class="user" method="POST">
                                       
                                        <?php
                                        if (!isset($_POST['update'])) {
                                            ?>
                                        <div class="form-group my-5">
                                            <input type="password" name="admin_pwd" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Contraseña">
                                        </div>
                                            <button name="update" type="submit" class="btn btn-dark btn-user btn-block">
                                                Actualizar
                                            </button>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if (isset($info)) {
                                            ?>
                                        <a href="./login.php" class="btn btn-app btn-user btn-block">
                                            Ir a Inicio de Sesión
                                        </a>
                                            <?php
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!-- JQUERY CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin Jquery Easing-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>