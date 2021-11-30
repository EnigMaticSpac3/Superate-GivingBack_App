<?php 
// This functions verifies if the user has ONLY LETTERS and SPACES
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

// This functions verifies the USER EXISTS
function userExists($conn, $email) {
  $sql   = "SELECT * FROM registration WHERE email=?;";
  $stmt  = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../pages/registration.php?error=stmtfailedemail");
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
function createUser($conn, $name, $email, $password) {
  $sql   = "INSERT INTO registration (names, email, password, createdOn) VALUES(?, ?, ?, NOW());";
  $stmt  = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../pages/registration.php?error=stmtfailedcreateuser");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../pages/login.php?registration=succesful");
  exit();
}

// This functions LOGINS the user
function loginUser($conn, $email, $password) {
  $userExists = userExists($conn, $email);

  if ($userExists === false) {
    header("location: ../pages/login.php?error=wronglogin-userfalse");
    exit();
  }

  $dbpassword    = $userExists["password"];
  // $checkpassword = password_verify($password, $dbpassword); 
  $checkpassword = ($dbpassword === $password);

  if ($checkpassword === false) {
    header("location: ../pages/login.php?error=wronglogin-pwdfalse");
    exit();
  } else if ($checkpassword === true) {
    session_start();
    $_SESSION['email']  = $userExists['email'];
    $_SESSION['name']   = $userExists['names'];
    $_SESSION['userID'] = $userExists['id'];
    header("location: ../index.php");
    exit();
  }
}