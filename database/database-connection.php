<?php
// <!-- Modify this part in order to connect to the database -->

// Create connection
class DatabaseConnect {
   function connect() {
      $hostname = "localhost";
      $user = "root";
      $pwd = "";
      $db = "giver_test";

      try {
         $connect = new PDO('mysql:host='.$hostname.';dbname='.$db , $user, $pwd);
         $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $connect;
      } catch (PDOException $e) {
         die("Hubo un Error de conexión: ".$e->getMessage());
      }
   }
}

