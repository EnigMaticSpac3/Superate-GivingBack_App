<!DOCTYPE html>
<?php
session_start();

if (isset($_POST['next2'])) {
     /** Store the submitted data sent
      * via POST method, stored Temporarily in $_POST structure.
      */
     $token = filter_input(INPUT_POST, 'authenticate', FILTER_SANITIZE_SPECIAL_CHARS);
     if (!$token || $token !== $_SESSION['secret_token']) {
          // return the person back, we're having a CSRF ATTACK!!

          header('Location: ../index.php?error=authenticate');
     } else {

          $_SESSION['email'] = $_POST['email'];
          $_SESSION['pwd']   = password_hash($_POST['user_pwd'], PASSWORD_ARGON2ID);
     }
}

// SAVING IN DATABaSE
include '../database/registration-inc.php';


// <!-- HTML de la 3ra sección de registro -->

// Add the name of the page inside this variable
$nombre_de_pagina = "Registro | GIVER"; // page's name
include "../includes/header-login-register.php";
?>
</head>

<body>
     <div class="hidden message">
          <p>No compatible con este dispositivo.</p>
          <p>Abrir desde un móvil</p>
     </div>
     <main>
          <div class="content">
               <h1 class="content-title">Registro</h1>
               <?php
               if (isset($error)) {
                    if ($error == 'userexists') {
                         echo '<div class="server-message">
                         <p>Este Usuario ya existe. <a href="../index.php">Inicia Sesión</a></p>
                         </div>';
                    }
                    if ($error === "success") {
                         echo '<div style="font-size: 4em" class="server-message">
                         <p>Te has Registrado. <a href="../">Inicia Sesión</a></p>
                         </div>';
                    }
               }
               ?>
               <div class="content-body">
                    <?php
                    if (!isset($error)) {
                    ?>
                         <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                              <input type="hidden" name="authenticate" value="<?php echo $_SESSION['secret_token'] ?? '' ?>">
                              <div class="form-body">
                                   <div class="edit-container">
                                        <p class="edit-txt">Sube una foto de Perfil</p>
                                        <div class="edit-photo-container">
                                             <ion-icon class="edit-photo" name="person-outline"></ion-icon>
                                        </div>
                                   </div>
                                   <div class="buttons-comp photo-button">
                                        <label for="photo-file">Subir</label>
                                        <input class="photo-input" type="file" name="photo-file" id="photo-file">
                                        <ion-icon class="photo-icon" name="image-outline"></ion-icon>
                                   </div>
                              </div>

                              <button class="buttons-comp" name="register" type="submit">Submit</button>
                         </form>
                    <?php
                    }

                    ?>
               </div>
          </div>
          <div class="btn-goback"><a href="./Registro2.php">
                    <ion-icon class="icon" name="caret-back-outline"></ion-icon>
               </a></div>
     </main>


     <?php include "../includes/footer-login-register.php" ?>

     <!-- VALIDAR QUE LA IMAGEN SUBIDA SEA PNG O JPG Y DENTRO DEL TAMAÑO ACEPTABLE -->
     <script type="text/javascript">
          $(document).ready(function() {
               const input = $('photo-input');
          })
     </script>
</body>

</html>