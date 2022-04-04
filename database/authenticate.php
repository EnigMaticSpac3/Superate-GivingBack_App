<?php
/** TOKEN para prevenir ataques CSRF */
// Creamos variables únicas para el usuario
$salt   = 'SALT'; /* (▀̿Ĺ̯▀̿ ̿) */
$time   =  time();
$userid =  session_id();
$token = $salt.$time.$userid;
$_SESSION['secret_token'] = password_hash($token, PASSWORD_DEFAULT);