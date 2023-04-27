<?php
$conn = new mysqli( "localhost", "root", "","cargarege");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
    