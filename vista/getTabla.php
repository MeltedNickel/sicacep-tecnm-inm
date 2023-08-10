<?php
require 'database.php';

$id = $conn->real_escape_string($_POST['id']);

$sql = "SELECT id, id_estatus, adscripcion_fisica, puesto_especifico, puesto_generico, codigo_plaza_actual, 
nivel_actual, num_empleado, nombre, rfc, curp, fecha_ingreso_inami, fecha_ingreso_plaza, tipo_de_plaza
FROM tabla WHERE id=$id LIMIT 1";
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$tabla = [];
if($rows > 0){
    $tabla = $resultado->fetch_array();
}

echo json_encode($tabla, JSON_UNESCAPED_UNICODE);
