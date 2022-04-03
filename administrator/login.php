<!DOCTYPE html>
<?php
session_start();
session_unset();
session_destroy();

// Verify Form Submission
if (isset($_POST['login'])) {
    require_once '../database/giverapp-functions.php';
    $user_object    = new GiverAppFunctions; 
    $user_object->setUserEmail($_POST['admin_email']);
    $user_data      = $user_object->get_user_data_by_email();
    
    if (is_array($user_data) && count($user_data)>0) {
        session_start();

        if (password_verify($_POST['admin_pwd'], $user_data['user_pwd'])){
            
            $user_object->setUserFirstName($user_data['user_firstname']);
            $user_object->setUserId($user_data['user_id']);
            
            $_SESSION['user_data'][$user_data['user_id']] = [
                'id'            => $user_data['user_id'],
                'firstname'     => $user_data['user_firstname'],
                'lastname'     => $user_data['user_lastname'],
                'promo'         => $user_data['promo']
            ];
            header('location: ./index.php?user='.$user_data['user_firstname']);
            
            
        } elseif (password_verify($_POST['admin_pwd'], password_hash($user_data['user_pwd'], PASSWORD_ARGON2I))) {
            
            $user_object->setUserFirstName($user_data['user_firstname']);
            $user_object->setUserId($user_data['user_id']);
            
            $_SESSION['user_data'][$user_data['user_id']] = [
                'id'            => $user_data['user_id'],
                'firstname'     => $user_data['user_firstname']
            ];
            header('location: update-credentials.php');
        //     echo 'se ejecuto pero no se ke pedo';
        } else {
            echo 'contraseña incorrecta';
        }
        
    } else {
        echo 'todo mal';
        $error = 'userdoesnotexists';
    }    
}
// print_r($user_data);
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GIVER Admin - Login</title>

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
<?php if(isset($_SESSION['user_data'])){print_r($_SESSION['use_data']);} ?>
    <div class="container">

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
                                        <h1 class="h4 text-gray-900 ">¡Bienvenido!</h1>
                                    </div>
                                    
                                    <?php
                                    if (isset($error)) {
                                        echo '<div style="width: 100%;" class="alert alert-warning alert-dismissible fade show d-flex flex-row justify-content-between" role="alert">
                                        <div>
                                            <strong>Oops!</strong> Su usuario no está registrado.
                                        </div>
                                        <div>
                                            <i type="button" class="fa-solid fa-xmark justify-content-end" data-bs-dismiss="alert" aria-label="Close"></i>
                                        </div>
                                    </div>';
                                    }
                                    ?>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="admin_email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Escriba su correo...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="admin_pwd" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recordarme</label>
                                            </div>
                                        </div>

                                        <button name="login" type="submit" class="btn btn-dark btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="../index.php" class="btn btn-app btn-user btn-block">
                                            <i class="fa-solid fa-mobile-button pr-2"></i> Ir a la App
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">¿Olvidó su contraseña?</a>
                                    </div>
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
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin Jquery Easing-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>