<?php
include '../database/connect-db.php';

// The data of the form will be handled by "registration-inc.php" IN the -Registration2.php-

?>


<!-- HTML de la 1era sección de registro -->
<!DOCTYPE html>
<html lang="es">
<head>
     
     <?php include "../includes/meta-inc.php" ?>
    <link rel="stylesheet" href="../resources/style/mainInicio.css">
    <title>Registro</title>
</head>
<body>
     <p class="hidden message">_No compatible con este dispositivo.</p>
     
     <div class="content" >
          <div class="center title">
               <h1>Registro</h1>
          </div>
          <form action="<?php echo htmlspecialchars("./Registro2.php"); ?>" class="formb" method="post">
               <div class="label">
                    <label for="Name">Nombre</label>
                    <input name="first_name" class=" input" type="text" placeholder="Ingrese su nombre" required> 
               </div>
               <div class="label">
                    <label class="block" for="">Apellido</label>
                    <input  required name="last_name" class=" input" type="text" placeholder="Ingrese su apellido">
               </div>

               <div class="label">
                    <label for="Elige">Elige</label> 
                    <br>
                    <select name="promo" class="input">
                         <option value="Freshman">Freshman</option>
                         <option value="Junior">Junior</option>
                         <option value="Senior">Senior</option>
                         <option value="Teacher">Teacher</option>
                         <option value="Egresado">Egresado</option>
                    </select>
               </div>

               <input class="button textcenter" name="next" type="submit" value="Siguiente">
              
          </form>
     </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>