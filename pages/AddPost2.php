<?php 
session_start();

if (!isset($_SESSION['userID'])) {
    session_unset();
    session_destroy();
    header("location: ./pages/welcome.php");
} else {
    echo "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include "../includes/meta-inc.php" ?>
     <title>Add post</title>
     <link rel="stylesheet" href="../resources/style/homestyles.css">
     <link rel="stylesheet" href="../resources/style/AddPost.css">
     <link rel="stylesheet" href="../resources/style/Hidden.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
     <p class="hidden message">_No compatible con este dispositivo.</p>
     <div class="container">
          <i class="fas fa-times" id="icon"></i>
          <div>
               <div id="profile1"></div>
               <div class="profileContainer">
                    <h4 class="name">Nombre y apellido</h4>
                    <p class="level">Senior/ Junior/ Freshman</p>
               </div>
          </div>
          <textarea name="" id="" cols="30" rows="10"> Escribe tu mensaje
          </textarea>
     </div>   
     <?php include "../includes/footer-inc.php" ?>
</body>
</html>