<?php
$conn = new mysqli( "localhost", "root", "","woodyautomotive");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
    