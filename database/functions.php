<?php 
// This functions verifies if the user has ONLY LETTERS and SPACES ---This should be made by javascript---
function invalidUsername($username) {
  $result = false;
  if (!preg_match("/^[a-zA-Z\s\D]+$/", $username))
  {
    $result = true;
  }
  else {
    $result = false;
  }; return $result;
}

// This functions verifies IF the USER EXISTS
function userExists($conn, $email, $loc) {
  $sql   = "SELECT * FROM users WHERE user_email=?;";
  $stmt  = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header($loc);
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    $check = false;
    return $check;
  }

  mysqli_stmt_close($stmt);
}

// This functions CREATES a NEW user
function createUser($conn, $firstname, $lastname, $email, $pwd, $promo) {
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
}

// This functions LOGINS the user
function loginUser($conn, $email, $password, $loc) {
  $userExists = userExists($conn, $email, $loc);

  if ($userExists === false) {
    header("location: ../pages/inicio_de_sesion.php?error=wronglogin-userfalse");
    exit();
  }

  $dbpassword    = $userExists["user_pwd"];
  // $checkpassword = password_verify($password, $dbpassword); 
  $checkpassword = ($dbpassword === $password);

  if ($checkpassword === false) {
    header("location: ../pages/inicio_de_sesion.php?error=wronglogin-pwdfalse");
    exit();
  } else if ($checkpassword === true) {
    session_start();
    $_SESSION['user_email']  = $userExists['user_email'];
    $_SESSION['name']        = $userExists['user_firstname'];
    $_SESSION['userID']      = $userExists['user_id'];
    header("location: ../index.php");
    exit();
  }
}