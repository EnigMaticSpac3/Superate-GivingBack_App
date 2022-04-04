<!DOCTYPE html>

<?php
// iniciamos la sesión para guardar datos temporalmente mientras se registra
session_start();

require_once('../database/authenticate.php');

/**  
* The data of the form will be handled by "registration-inc.php" IN the -Registration2.php- file
*/

// Add the name of the page inside this variable
$nombre_de_pagina = "Registro | GIVER" ; // page's name
include "../includes/header-login-register.php"; 

?>
</head>
<body>
     <div class="hidden message">
        <p>No compatible con este dispositivo.</p>
        <p>Abrir desde un móvil</p>
     </div>

     <main>
          <div class="content" >
               <h1 class="content-title">Registro</h1>
               <div class="content-body">
                    <form id="form" action="<?php echo htmlspecialchars("./Registro2.php"); ?>" class="form" method="post"  autocomplete="off">
                    <input type="hidden" name="authenticate" value="<?php echo $_SESSION['secret_token'] ?? '' ?>">
                         <div class="form-body">
                              <div class="form-box">
                                   <label for="first_name">Nombre</label>
                                   <input name="first_name" class="form-input" type="text" placeholder="Ingrese su nombre"> 
                              </div>
                              <div class="form-box">
                                   <label for="last_name">Apellido</label>
                                   <input  name="last_name" class=" form-input" type="text" placeholder="Ingrese su apellido">
                              </div>
               
                              <div class="form-box">
                                   <label for="Elige">Elige</label> 
                                   <select name="promo" class="form-input">
                                        <option value="Freshman">Freshman</option>
                                        <option value="Junior">Junior</option>
                                        <option value="Senior">Senior</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Egresado">Egresado</option>
                                   </select>
                              </div>
                         </div>
                         <button class="buttons-comp" name="next" type="submit">Siguiente</button>
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