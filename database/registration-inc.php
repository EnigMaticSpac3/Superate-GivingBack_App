<?php
include '../database/connect-db.php';
// Initialize the session
session_start();



if (isset($_POST['submit'])) {
    // Variables from previous page
    $firstname = $_SESSION['firstname'];
    $lastname  = $_SESSION['lastname'];
    $promo     = $_SESSION['promo'];
    $email     = $_POST['email'];
    $pwd       = $_POST['user_pwd'];
 
    $sql = "INSERT INTO users (user_firstname, user_lastname, user_email, user_pwd, promo, createdOn) values ($firstname, $lastname, $email, $pwd, $promo, NOW())";

    mysqli_query($conn, $sql);
}
?>