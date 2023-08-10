<?php
//include database configuration file
require 'database.php';

//get records from database
$query = $conn->query("SELECT * from tabla ORDER BY id ASC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "PLANTILLA_DE_CAPACITACION_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('id_estatus', 'adscripcion_fisica', 'puesto_especifico', 'puesto_generico', 'codigo_plaza_actual',
    'nivel_actual', 'num_empleado', 'nombre', 'rfc', 'curp', 'fecha_ingreso_inami', 'fecha_ingreso_plaza', 'tipo_de_plaza', 'fecha_mov');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        
        $lineData = array($row['id_estatus'], $row['adscripcion_fisica'], $row['puesto_especifico'], $row['puesto_generico'], $row['codigo_plaza_actual'], $row['nivel_actual'],
        $row['num_empleado'], $row['nombre'], $row['rfc'], $row['curp'], $row['fecha_ingreso_inami'], $row['fecha_ingreso_plaza'], $row['tipo_de_plaza'], $row['fecha_mov']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;
?>