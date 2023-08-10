<?php

require 'database.php';

$id = $conn->real_escape_string($_POST['id']);
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

$sql ="UPDATE tabla 
    SET id_estatus = '$estatus',
        adscripcion_fisica = '$adscripcion_fisica',
        puesto_especifico = '$puesto_especifico',
        puesto_generico = '$puesto_generico',
        codigo_plaza_actual = '$codigo_plaza_actual',
        nivel_actual = '$nivel_actual',
        num_empleado = '$num_empleado',
        nombre = '$nombre',
        rfc = '$rfc',
        curp = '$curp',
        fecha_ingreso_inami = '$fecha_ingreso_inami',
        fecha_ingreso_plaza = '$fecha_ingreso_plaza',
        tipo_de_plaza = '$tipo_de_plaza',
        fecha_mov = NOW()
    WHERE id = $id";
if($conn->query($sql)){
}

header('Location: plantilla_de_activos.php');