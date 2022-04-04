<?php
session_start();
/**
 * Checking AUTHENTICATION TOKEN
 */
$user_token = filter_input(INPUT_POST, 'authenticate', FILTER_SANITIZE_SPECIAL_CHARS);

if (isset($_POST['login'])) {

    if (!$user_token || $user_token !== $_SESSION['secret_token']) {
        // return the person back, we're having a CSRF ATTACK!!
        header('Location: ../index.php?error=authenticate');
    } 
    else 
    {
        require_once('../database/giverapp-functions.php');
        $user_object = new GiverAppFunctions;
        $user_object->setUserEmail($_POST['email']);
        $user_data = $user_object->get_user_data_by_email();
        if (is_array($user_data) && count($user_data)>0) {
            if (password_verify($_POST['pwd'], $user_data['user_pwd'])) {
                
                $user_object->setUserFirstName($user_data['user_firstname']);
                $user_object->setUserLastName($user_data['user_lastname']);
                $user_object->setUserId($user_data['user_id']);

                $_SESSION['user_data'][$user_data['user_id']] = [
                    'id'        => $user_data['user_id'],
                    'firstname' => $user_data['user_firstname'],
                    'lastname'  => $user_data['user_lastname'],
                    'promo'     => $user_data['promo']
                ];
                $cookie_user         = 'username';
                $cookie_userFull     = 'usernameFull';
                setcookie(
                    $cookie_user,
                    $user_data['user_firstname'],
                    0,
                    '/', "", true
                );
                
                header('location: ../app.php?username='.$user_data['user_firstname']." ".$user_data['user_lastname']);
                
            } else {
                password_verify("", $user_data['user_pwd']);
                $error = "Verify your credentials";
            }
        } else {
            $error = "This user doesn't exist. Register!";
        }
    }
}