<?php
include '../database/connect-db.php';
// Initialize the session


if (isset($_POST['submit'])) {
    // Variables from previous pages
    $firstname = $_SESSION['firstname'];
    $lastname  = $_SESSION['lastname'];
    $promo     = $_SESSION['promo'];
    $email     = $_SESSION['email'];
    $pwd       = $_SESSION['pwd'];
 
    $sql = "INSERT INTO users (user_firstname, user_lastname, promo, user_email, user_pwd, createdOn) VALUES (?, ?, ?, ?, ?, NOW());";

    $stmt  = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../pages/Registro3.php?error=stmtfailedcreateuser");
      exit();
    }
  
    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $promo, $email, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pages/welcome.php?registration=succesful");
    exit();
} else {
    header('./Registro3.php?error=noinsert');
}
?>