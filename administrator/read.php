<?php 
include '../database/connect-db.php';

if(!isset($_POST['buscar'])){
    $_POST['buscar'] = "";
    $buscar = $_POST['buscar'];
}
$buscar = $_POST['buscar'];
// $SQL_READ = "SELECT * FROM users WHERE user_id LIKE '%".$buscar."%' OR user_firstname LIKE '%".$buscar."%' OR user_lastname LIKE '%".$buscar."%' OR user_email LIKE '%".$buscar."%' OR user_password LIKE '%".$buscar."%' OR promo LIKE '%".$buscar."%'";
$SQL_READ = "SELECT * FROM users ORDER BY user_id DESC";
$sql_query = mysqli_query($conn,$SQL_READ);


?>