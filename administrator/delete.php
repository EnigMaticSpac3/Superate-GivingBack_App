<?php
include "../database/connect-db.php";

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE user_id = $id";

if ($conn->query($sql) === TRUE) {
  header("Location:index.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>