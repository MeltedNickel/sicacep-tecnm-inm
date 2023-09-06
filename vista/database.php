<?php
$conn = new mysqli("localhost", "root", "", "sicacep");

if($conn->connect_error){
    die("Error de conexión" . $conn->connect_error);
}
?>