<?php
    
    $servername="localhost";
    $user="root";
    $pass= "";
    $bd="giver";

    $conn = new mysqli($server, $user, $pass, $bd);
    if(msqli_connect_errno()){
        echo"Failed to connect to server" . mysqli_connect_error();
        exit();
    };
?>