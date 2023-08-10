<?php
require 'database.php';

$estatus = $conn->real_escape_string($_POST['estatus']);
$adscripcion_fisica = $conn->real_escape_string($_POST['adscripcion_fisica']);
$puesto_especifico = $conn->real_escape_string($_POST['puesto_especifico']);
$puesto_generico = $conn->real_escape_string($_POST['puesto_generico']);
$codigo_plaza_actual = $conn->real_escape_string($_POST['codigo_plaza_actual']);
$nivel_actual = $conn->real_escape_string($_POST['nivel_actual']);
$num_empleado = $conn->real_escape_string($_POST['num_empleado']);
$nombre = $conn->real_escape_string($_POST['nombre']);
$rfc = $conn->real_escape_string($_POST['rfc']);
$curp = $conn->real_escape_string($_POST['curp']);
$fecha_ingreso_inami = $conn->real_escape_string($_POST['fecha_ingreso_inami']);
$fecha_ingreso_plaza = $conn->real_escape_string($_POST['fecha_ingreso_plaza']);
$tipo_de_plaza = $conn->real_escape_string($_POST['tipo_de_plaza']);
$fecha_mov = $conn->real_escape_string($_POST['fecha_mov']);

$sql = "INSERT INTO tabla (id_estatus, adscripcion_fisica, puesto_especifico, puesto_generico, codigo_plaza_actual, 
nivel_actual, num_empleado, nombre, rfc, curp, fecha_ingreso_inami, fecha_ingreso_plaza, tipo_de_plaza, fecha_mov) 
VALUES ('$estatus', '$adscripcion_fisica', '$puesto_especifico', '$puesto_generico', '$codigo_plaza_actual',
'$nivel_actual', '$num_empleado', '$nombre', '$rfc', '$curp', '$fecha_ingreso_inami', '$fecha_ingreso_plaza', '$tipo_de_plaza', NOW())";
if($conn->query($sql)){
    $id = $conn->insert_id;
}

header('Location: plantilla_de_activos.php');




