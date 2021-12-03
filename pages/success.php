<?php
session_start();
    $_SESSION['firstname'] = $_SESSION['firstname'];
    $_SESSION['lastname'] = $_SESSION['lastname'];
    $_SESSION['promo'] = $_SESSION['promo'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['pwd']   = $_POST['user_pwd'];

    echo $_SESSION['firstname'];
    echo $_SESSION['lastname'];
    echo $_SESSION['promo'];
    echo $_SESSION['email'];
    echo $_SESSION['pwd'];

    include "../database/registration-inc.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=".">
        <input type="submit" value="Submit">
    </form>
    
</body>
</html>