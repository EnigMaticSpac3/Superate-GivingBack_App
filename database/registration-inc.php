<?php
require '../database/database-connection.php';


if (isset($_POST['register'])) {
    // Variables from previous pages
    $firstname = $_SESSION['firstname'];
    $lastname  = $_SESSION['lastname'];
    $promo     = $_SESSION['promo'];
    $email     = $_SESSION['email'];
    $pwd       = $_SESSION['pwd'];
    $loc       = "location: ../pages/Registro3.php?error=userexists";

    require_once "../database/giverapp-functions.php";

    $user_object = new GiverAppFunctions;

    // Define the variables in the GiverAppFunctions Instance -> $user_object
    $user_object->setUserFirstName($firstname);
    $user_object->setUserLastName($lastname);
    $user_object->setUserPromo($promo);
    $user_object->setUserEmail($email);
    $user_object->setUserPwd($pwd);

    // Verify the Account doesn't exists yet
    $user_data = $user_object->get_user_data_by_email();
    if(is_array($user_data) && count($user_data)>0) {
        $error = 'userexists';
    } else {
        // Save data
        if ($user_object->save_data()) {
            $error = "success";
        }
    }

} else {
    header('./Registro3.php?error=noinsert');
}
?>