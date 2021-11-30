<?php
include '../database/connect-db.php';

?>


<!-- HTML de la 1era sección de registro -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/style/mainInicio.css">
    <title>Registro</title>
</head>
<body>
     <p class="hidden message">_No compatible con este dispositivo.</p>
     
     <div class="content" >
          <div class="center title">
               <h1>Registro</h1>
          </div>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="formb" method="post">
               <div class="label">
                    <label for="Name">Nombre</label>
                    <input required name="first_name" class=" input" type="text" placeholder="Ingrese su nombre"> 
               </div>
               <div class="label">
                    <label class="block" for="">Apellido</label>
                    <input  required name="last_name" class=" input" type="text" placeholder="Ingrese su apellido">
               </div>

               <div class="label">
                    <label for="Elige">Elige</label> 
                    <br>
                    <select name="promo" class="input" name="Elige">
                         <option value="Freshman">Freshman</option>
                         <option value="Junior">Junior</option>
                         <option value="Senior">Senior</option>
                         <option value="Teacher">Teacher</option>
                         <option value="Egresado">Egresado</option>
                    </select>
               </div>

 
               <a   href="./Registro2.php">
                    <div class="button">
                        <p class="textcenter" name="next">Siguiente</p>
                    </div>
                </a>
          </form>
     </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>