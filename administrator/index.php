<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Buscador</title>
</head>
<body>
    <center>
    <h1>Buscador en Base de Datos ¡Supérate!</h1>

    <form action="index.php" method="POST" class="d-flex" style="width:500px">
        <input type="text" name="buscar" class="form-control me-2">
        <button class="btn btn-outline-success" type="submit" value="Buscar">Search</button>
      </form>

    </form>    
    </center>
    <hr>
    <center>
    <h1>Resultados de la busqueda</h1>
    </center>
    <table border="2px" class="table table-success table-striped">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Contraseña</th>
            <th>Promo</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>
            <?php 
            
            include './read.php';
            
            while ($row = mysqli_fetch_array($sql_query)){?>
                <tr>
                    <td><?= $row['user_id'] ?></td>
                    <td><?= $row['user_firstname'] ?></td>
                    <td><?= $row['user_lastname'] ?></td>
                    <td><?= $row['promo'] ?></td>
                    <td><?= $row['user_email'] ?></td>
                    <td><?= $row['user_pwd'] ?></td>
                    <td>
                    <a href="../administrator/edit.php?id=<?= $row["user_id"] ?>">
                            <button class="btn btn-primary">Editar</button>
                    </a>
                    </td>    
                    <td><a href="../administrator/delete.php?id=<?php echo $row["user_id"]?>">
                            <button class="btn btn-danger">Eliminar</button>
                    </a> </td>
                </tr>

            <?php }
            ?>
        </tbody>  
    </table>  
</body>
</html>