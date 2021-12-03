<?php
     // SAVING the data of the form - handled by "registration-inc.php"
     session_start();
     // Store the submitted data sent
     // via POST method, stored 
     
     // Temporarily in $_POST structure.
     $_SESSION['firstname'] = $_SESSION['firstname'];
     $_SESSION['lastname'] = $_SESSION['lastname'];
     $_SESSION['promo'] = $_SESSION['promo'];
     $_SESSION['email'] = $_POST['email'];
     $_SESSION['pwd']   = $_POST['user_pwd'];
     
    echo $_SESSION['email'];
?>

<!-- HTML de la 3ra sección de registro -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../resources/style/mainInicio.css">
    <link rel="stylesheet" href="../resources/style/Registro.css">
</head>
<body>
     <p class="hidden message">_No compatible con este dispositivo.</p>
     
     <div class="content">
          <div class="center title">
               <h1>Registro</h1>
          </div>
          <a href="">
               <img src="../resources/img/Profile.png" alt="">     
          </a>
          <form class="formb" action="<?php echo htmlspecialchars("./success.php"); ?>" method="post">
               <div class="label">
                    <label for="">Fecha de nacimiento</label>
                    <input required type="date" class="input" name="birthday">
               </div>
               <button class="button2 textcenter" name="submit" type="submit">Submit</button>
          </form>
     </div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>