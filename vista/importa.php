<?php
// Load the database configuration file
require 'database.php';

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data            
                $id_estatus = $line[0];
                $adscripcion_fisica = $line[1];
                $puesto_especifico = $line[2];
                $puesto_generico = $line[3];
                $codigo_plaza_actual = $line[4];
                $nivel_actual = $line[5];
                $num_empleado = $line[6];
                $nombre = addslashes($line[7]);
                $rfc = $line[8];
                $curp = $line[9];
                $fecha_ingreso_inami = $line[10];
                $fecha_ingreso_plaza = $line[11];
                $tipo_de_plaza = $line[12];
                $fecha_mov = $line[13];
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM tabla WHERE curp = '".$line[9]."'";
                $prevResult = $conn->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $conn->query("UPDATE tabla 
                    SET id_estatus = '".$id_estatus."', 
                        adscripcion_fisica = '".$adscripcion_fisica."', 
                        puesto_especifico = '".$puesto_especifico."', 
                        puesto_generico = '".$puesto_generico."', 
                        codigo_plaza_actual = '".$codigo_plaza_actual."', 
                        nivel_actual = '".$nivel_actual."', 
                        num_empleado = '".$num_empleado."', 
                        nombre = '".$nombre."', 
                        rfc = '".$rfc."', 
                        fecha_ingreso_inami = '".$fecha_ingreso_inami."', 
                        fecha_ingreso_plaza = '".$fecha_ingreso_plaza."', 
                        tipo_de_plaza = '".$tipo_de_plaza."',
                        fecha_mov = NOW()
                    WHERE curp = '".$curp."'");
                }else{
                    // Insert member data in the database
                    $conn->query("INSERT INTO tabla (id_estatus, adscripcion_fisica, puesto_especifico, puesto_generico, codigo_plaza_actual, 
                    nivel_actual, num_empleado, nombre, rfc, curp, fecha_ingreso_inami, fecha_ingreso_plaza, tipo_de_plaza, fecha_mov) 
                    VALUES ('".$id_estatus."', '".$adscripcion_fisica."', '".$puesto_especifico."', '".$puesto_generico."', '".$codigo_plaza_actual."',
                    '".$nivel_actual."', '".$num_empleado."', '".$nombre."', '".$rfc."', '".$curp."', '".$fecha_ingreso_inami."', '".$fecha_ingreso_plaza."', '".$tipo_de_plaza."', NOW())");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: plantilla_de_activos.php");