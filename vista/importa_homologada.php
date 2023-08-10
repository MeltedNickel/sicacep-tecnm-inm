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
                $registro = addslashes($line[0]);
                $anio = addslashes($line[1]);
                $movimiento = addslashes($line[2]);
                $acronimo = addslashes($line[3]);
                $procedencia = addslashes($line[4]);
                $lugar_nacimiento = addslashes($line[5]);
                $tipo_ads = addslashes($line[6]);
                $adscripcion = addslashes($line[7]);
                $adscripcion_homologada2 = addslashes($line[8]);
                $nombre = addslashes($line[9]);
                $apellido_pat = addslashes($line[10]);
                $apellido_mat = addslashes($line[11]);
                $nombre_com = addslashes($line[12]);
                $genero = addslashes($line[13]);
                $rfc = addslashes($line[14]);
                $edad = addslashes($line[15]);
                $numero_emp = addslashes($line[16]);
                $opi = addslashes($line[17]);
                $concepto_58 = addslashes($line[18]);
                $apoyo = addslashes($line[19]);
                $consecutivo_plaza = addslashes($line[20]);
                $codigo_plaza = addslashes($line[21]);
                $nivel = addslashes($line[22]);
                $tipo_personal = addslashes($line[23]);
                $categoria_nivel = addslashes($line[24]);
                $puesto_plaza = addslashes($line[25]);
                $puesto = addslashes($line[26]);
                $fecha_ingreso = addslashes($line[27]);
                $antigüedad = addslashes($line[28]);
                $folio_asignatura = addslashes($line[29]);
                $consecutivo_inm = addslashes($line[30]);
                $clave_programacion = addslashes($line[31]);
                $expediente = addslashes($line[32]);
                $nombre_evento = addslashes($line[33]);
                $nombre_evento2 = addslashes($line[34]);
                $cat_bloque = addslashes($line[35]);
                $bloque = addslashes($line[36]);
                $seccion = addslashes($line[37]);
                $programa = addslashes($line[38]);
                $subprograma = addslashes($line[39]);
                $evento_pac = addslashes($line[40]);
                $categoria = addslashes($line[41]);
                $fecha_inicio = addslashes($line[42]);
                $fecha_fin = addslashes($line[43]);
                $horas = addslashes($line[44]);
                $faltas = addslashes($line[45]);
                $pais_sede = addslashes($line[46]);
                $estado_sede = addslashes($line[47]);
                $sede = addslashes($line[48]);
                $salon = addslashes($line[49]);
                $accion_capacitacion = addslashes($line[50]);
                $evento = addslashes($line[51]);
                $tipo_competencias = addslashes($line[52]);
                $competencias = addslashes($line[53]);
                $modalidad = addslashes($line[54]);
                $modalidad2 = addslashes($line[55]);
                $asignacion_normativa = addslashes($line[56]);
                $estatus = addslashes($line[57]);
                $evento_migrado = addslashes($line[58]);
                $costo_aprox = addslashes($line[59]);
                $costo_ajust = addslashes($line[60]);
                $calificacion_inicial = addslashes($line[61]);
                $calificacion_final = addslashes($line[62]);
                $estatus_acreditacion = addslashes($line[63]);
                $estatus_acreditacion2 = addslashes($line[64]);
                $estatus_inscripcion = addslashes($line[65]);
                $coordinador = addslashes($line[66]);
                $coordinador_numemp = addslashes($line[67]);
                $coordinador2 = addslashes($line[68]);
                $corordinador_numemp2 = addslashes($line[69]);
                $instructores = addslashes($line[70]);
                $procedencias = addslashes($line[71]);
                $instructores_externos = addslashes($line[72]);
                $procedencias_extenas = addslashes($line[73]);
                $mes_reporte = addslashes($line[74]);
                $pais_procedencia = addslashes($line[75]);
                $tipo_pais = addslashes($line[76]);
                $codigos_emp = addslashes($line[77]);
                $dsespecifica_descripcion = addslashes($line[78]);
                $temas_legalidad_dh = addslashes($line[79]);
                $duracion2 = addslashes($line[80]);
                $fecha_cierre = addslashes($line[81]);
                $periodo = addslashes($line[82]);
                $historico = addslashes($line[83]);
                $motivo = addslashes($line[84]);
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT registro FROM homologada WHERE rfc = '".$line[14]."'";
                $prevResult = $conn->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $conn->query("UPDATE homologada 
                SET registro = '".$registro."',
                    anio = '".$anio."',
                    movimiento = '".$movimiento."',
                    acronimo = '".$acronimo."',
                    procedencia = '".$procedencia."',
                    lugar_nacimiento = '".$lugar_nacimiento."',
                    tipo_ads = '".$tipo_ads."',
                    adscripcion = '".$adscripcion."',
                    adscripcion_homologada2 = '".$adscripcion_homologada2."',
                    nombre = '".$nombre."',
                    apellido_pat = '".$apellido_pat."',
                    apellido_mat = '".$apellido_mat."',
                    nombre_com = '".$nombre_com."',
                    genero = '".$genero."',
                    edad = '".$edad."',
                    numero_emp = '".$numero_emp."',
                    opi = '".$opi."',
                    concepto_58 = '".$concepto_58."',
                    apoyo = '".$apoyo."',
                    consecutivo_plaza = '".$consecutivo_plaza."',
                    codigo_plaza = '".$codigo_plaza."',
                    nivel = '".$nivel."',
                    tipo_personal = '".$tipo_personal."',
                    categoria_nivel = '".$categoria_nivel."',
                    puesto_plaza = '".$puesto_plaza."',
                    puesto = '".$puesto."',
                    fecha_ingreso = '".$fecha_ingreso."',
                    antigüedad = '".$antigüedad."',
                    folio_asignatura = '".$folio_asignatura."',
                    consecutivo_inm = '".$consecutivo_inm."',
                    clave_programacion = '".$clave_programacion."',
                    expediente = '".$expediente."',
                    nombre_evento = '".$nombre_evento."',
                    nombre_evento2 = '".$nombre_evento2."',
                    cat_bloque = '".$cat_bloque."',
                    bloque = '".$bloque."',
                    seccion = '".$seccion."',
                    programa = '".$programa."',
                    subprograma = '".$subprograma."',
                    evento_pac = '".$evento_pac."',
                    categoria = '".$categoria."',
                    fecha_inicio = '".$fecha_inicio."',
                    fecha_fin = '".$fecha_fin."',
                    horas = '".$horas."',
                    faltas = '".$faltas."',
                    pais_sede = '".$pais_sede."',
                    estado_sede = '".$estado_sede."',
                    sede = '".$sede."',
                    salon = '".$salon."',
                    accion_capacitacion = '".$accion_capacitacion."',
                    evento = '".$evento."',
                    tipo_competencias = '".$tipo_competencias."',
                    competencias = '".$competencias."',
                    modalidad = '".$modalidad."',
                    modalidad2 = '".$modalidad2."',
                    asignacion_normativa = '".$asignacion_normativa."',
                    estatus = '".$estatus."',
                    evento_migrado = '".$evento_migrado."',
                    costo_aprox = '".$costo_aprox."',
                    costo_ajust = '".$costo_ajust."',
                    calificacion_inicial = '".$calificacion_inicial."',
                    calificacion_final = '".$calificacion_final."',
                    estatus_acreditacion = '".$estatus_acreditacion."',
                    estatus_acreditacion2 = '".$estatus_acreditacion2."',
                    estatus_inscripcion = '".$estatus_inscripcion."',
                    coordinador = '".$coordinador."',
                    coordinador_numemp = '".$coordinador_numemp."',
                    coordinador2 = '".$coordinador2."',
                    corordinador_numemp2 = '".$corordinador_numemp2."',
                    instructores = '".$instructores."',
                    procedencias = '".$procedencias."',
                    instructores_externos = '".$instructores_externos."',
                    procedencias_extenas = '".$procedencias_extenas."',
                    mes_reporte = '".$mes_reporte."',
                    pais_procedencia = '".$pais_procedencia."',
                    tipo_pais = '".$tipo_pais."',
                    codigos_emp = '".$codigos_emp."',
                    dsespecifica_descripcion = '".$dsespecifica_descripcion."',
                    temas_legalidad_dh = '".$temas_legalidad_dh."',
                    duracion2 = '".$duracion2."',
                    fecha_cierre = '".$fecha_cierre."',
                    periodo = '".$periodo."',
                    historico = '".$historico."',
                    motivo = '".$motivo."'
                WHERE rfc = '".$rfc."'");
                }else{
                    // Insert member data in the database
                    $conn->query("INSERT INTO homologada (registro, anio, movimiento, acronimo, procedencia, lugar_nacimiento, tipo_ads, adscripcion, adscripcion_homologada2,
                    nombre, apellido_pat, apellido_mat, nombre_com, genero, rfc, edad, numero_emp, opi, concepto_58, apoyo, consecutivo_plaza, codigo_plaza,
                    nivel, tipo_personal, categoria_nivel, puesto_plaza, puesto, fecha_ingreso, antigüedad, folio_asignatura, consecutivo_inm, clave_programacion,
                    expediente, nombre_evento, nombre_evento2, cat_bloque, bloque, seccion, programa, subprograma, evento_pac, categoria, fecha_inicio, fecha_fin,
                    horas, faltas, pais_sede, estado_sede, sede, salon, accion_capacitacion, evento, tipo_competencias, competencias, modalidad, modalidad2,
                    asignacion_normativa, estatus, evento_migrado, costo_aprox, costo_ajust, calificacion_inicial, calificacion_final, estatus_acreditacion, estatus_acreditacion2,
                    estatus_inscripcion, coordinador, coordinador_numemp, coordinador2, corordinador_numemp2, instructores, procedencias, instructores_externos, procedencias_extenas,
                    mes_reporte, pais_procedencia, tipo_pais, codigos_emp, dsespecifica_descripcion, temas_legalidad_dh, duracion2, fecha_cierre, periodo, historico, motivo) 
                    VALUES ('".$registro."', '".$anio."', '".$movimiento."', '".$acronimo."', '".$procedencia."', '".$lugar_nacimiento."', '".$tipo_ads."', '".$adscripcion."', '".$adscripcion_homologada2."',
                    '".$nombre."', '".$apellido_pat."', '".$apellido_mat."', '".$nombre_com."', '".$genero."', '".$rfc."', '".$edad."', '".$numero_emp."', '".$opi."', '".$concepto_58."', '".$apoyo."', '".$consecutivo_plaza."', '".$codigo_plaza."',
                    '".$nivel."', '".$tipo_personal."', '".$categoria_nivel."', '".$puesto_plaza."', '".$puesto."', '".$fecha_ingreso."', '".$antigüedad."', '".$folio_asignatura."', '".$consecutivo_inm."', '".$clave_programacion."',
                    '".$expediente."', '".$nombre_evento."', '".$nombre_evento2."', '".$cat_bloque."', '".$bloque."', '".$seccion."', '".$programa."', '".$subprograma."', '".$evento_pac."', '".$categoria."', '".$fecha_inicio."', '".$fecha_fin."',
                    '".$horas."', '".$faltas."', '".$pais_sede."', '".$estado_sede."', '".$sede."', '".$salon."', '".$accion_capacitacion."', '".$evento."', '".$tipo_competencias."', '".$competencias."', '".$modalidad."', '".$modalidad2."',
                    '".$asignacion_normativa."', '".$estatus."', '".$evento_migrado."', '".$costo_aprox."', '".$costo_ajust."', '".$calificacion_inicial."', '".$calificacion_final."', '".$estatus_acreditacion."', '".$estatus_acreditacion2."',
                    '".$estatus_inscripcion."', '".$coordinador."', '".$coordinador_numemp."', '".$coordinador2."', '".$corordinador_numemp2."', '".$instructores."', '".$procedencias."', '".$instructores_externos."', '".$procedencias_extenas."',
                    '".$mes_reporte."', '".$pais_procedencia."', '".$tipo_pais."', '".$codigos_emp."', '".$dsespecifica_descripcion."', '".$temas_legalidad_dh."', '".$duracion2."', '".$fecha_cierre."', '".$periodo."', '".$historico."', '".$motivo."')");
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
header("Location: homologada.php");