<?php
include '../database/connect-db.php';


if (isset($_POST['submit'])) {
    // Variables from previous pages
    $firstname = $_SESSION['firstname'];
    $lastname  = $_SESSION['lastname'];
    $promo     = $_SESSION['promo'];
    $email     = $_SESSION['email'];
    $pwd       = $_SESSION['pwd'];
 
    require './functions.php';
    createUser($conn, $firstname, $lastname, $email, $pwd, $promo);
} else {
    header('./Registro3.php?error=noinsert');
}
?>