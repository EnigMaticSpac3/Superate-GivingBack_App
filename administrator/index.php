<?php
session_start();
foreach ($_SESSION['user_data'] as $key => $value) {
    $promo      = $value['promo'];
    $firstname  = $value['firstname'];
    $lastname   = $value['lastname'];
}
if(!isset($_GET['user'])) {
    header("location: login.php?userdoesnotexists");
} elseif ($promo != 'admin') { /* la persona no tiene permitido entrar aquí */
    echo "algo anda mal";
    session_unset();
    session_destroy();
    header('location: ../index.php');
}
require_once "../database/database-connection.php";
$database       = new DatabaseConnect;
$connection     = $database->connect();

$consulta       = "SELECT user_id, user_firstname, user_lastname, promo, user_email, createdOn FROM users";
$resultado      = $connection->prepare($consulta);
$resultado->execute();
$data           = $resultado->fetchAll(PDO::FETCH_ASSOC);
require_once './includes/header.php';
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered table-condensed" style="width: 100%;">
                            <thead class="text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Promo</th>
                                    <th>Email</th>
                                    <th>Creado El</th>
                                    <th><i class="fa-solid fa-gear"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $info){
                                ?>
                                <tr>
                                    <th><?php echo $info['user_id'] ?></th>
                                    <th><?php echo $info['user_firstname'] ?></th>
                                    <th><?php echo $info['user_lastname'] ?></th>
                                    <th><?php echo $info['promo'] ?></th>
                                    <th><?php echo $info['user_email'] ?></th>
                                    <th><?php echo $info['createdOn'] ?></th>
                                    <th><button class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></button></th>
                                </tr>    
                                <?php } ?> 
                            </tbody>
                        </table>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php require_once './includes/footer.php' ?>