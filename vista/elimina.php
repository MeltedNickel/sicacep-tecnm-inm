<?php
require 'database.php';

$id = $conn->real_escape_string($_POST['id']);

$sql = "DELETE FROM tabla WHERE id=$id";
if ($conn->query($sql)){

}
header('Location: plantilla_de_activos.php');