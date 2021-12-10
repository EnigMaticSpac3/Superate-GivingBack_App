<?php
include '../database/connect-db.php';


if (isset($_POST['submit'])) {
    // Variables from previous pages
    $firstname = $_SESSION['firstname'];
    $lastname  = $_SESSION['lastname'];
    $promo     = $_SESSION['promo'];
    $email     = $_SESSION['email'];
    $pwd       = $_SESSION['pwd'];
    $loc       = "location: ../pages/Registro3.php?error=userexists";

    require_once "../database/functions.php";
    $userExists = userExists($conn, $email, $loc);
    if ($userExists === false) {
        createUser($conn, $firstname, $lastname, $email, $pwd, $promo);
        exit();
    } else {
        header($loc);
        exit();
    }
    
} else {
    header('./Registro3.php?error=noinsert');
}
?>