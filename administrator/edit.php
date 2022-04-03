<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edición</title>
</head>
<body class="p-3 mb-2 bg-primary text-white">
    
</body>
</html>
<?php
include '../database/database-connection.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

if(isset($_GET['id']))
{
$id = $_GET['id'];
$sql_read_update = "SELECT * FROM users WHERE user_id = $id";

$result = mysqli_query($conn, $sql_read_update);

if (!$result || mysqli_num_rows($result) == 0){
    echo 'No hay resultado';
    
} else {
    $row = mysqli_fetch_array($result);
    
}
};

// SEGUNDA CONSULTA - actualizar datos del registro.

if(isset($_POST['update']))
{
    $name = $_POST['nombre'];
    $surname = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['contrasena'];
    $promo = $_POST['promo'];
    $id = $_GET['id'];

    $sql_update = "UPDATE users SET user_firstname = '$name', user_lastname = '$surname',  promo = '$promo', user_email = '$email', user_pwd = '$password' WHERE user_id = $id";
    // $result = mysqli_query($conn, $sql_update);
    if (mysqli_query($conn, $sql_update)) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }
      
      mysqli_close($conn);

    header('Location: ./index.php');

}

?>

<center>
<form action="edit.php?id=<?= $row['user_id'] ?>" method="POST">
    <label for="id" class="form-label">ID</label>
    <input type="text"  class="form-control" id="id" name="id" value="<?= $row['user_id'] ?>" style="width:500px"> 

    <label for="nombre" class="form-label">Nombre(s)</label> 
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $row['user_name'] ?>" style="width:500px"> 

    <label for="apellido" class="form-label">Apellido(s)</label> 
    <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $row['user_surname'] ?>" style="width:500px"> 

    <label for="email" class="form-label">Email</label> 
    <input type="text" class="form-control" id="email" name="email" value="<?= $row['user_email'] ?>" style="width:500px"> 

    <label for="contraseña" class="form-label">Contraseña</label> 
    <input type="text" class="form-control" id="contraseña" name="contrasena" value="<?= $row['user_password'] ?>" style="width:500px"> 

    <label for="status" class="form-label">Promo</label> 
    <input type="text"  class="form-control" id="promo" name="promo" value="<?= $row['promo'] ?>" style="width:500px"><br> 

    <input type="submit" class="form-control" value="Actualizar" name="update" style="width:500px">
</form>
</center>


