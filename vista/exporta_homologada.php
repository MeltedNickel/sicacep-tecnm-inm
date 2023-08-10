<?php
//include database configuration file
require 'database.php';

//get records from database
$query = $conn->query("SELECT * from homologada ORDER BY registro ASC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "HOMOLOGADA_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('registro', 'anio', 'movimiento', 'acronimo', 'procedencia', 'lugar_nacimiento', 'tipo_ads', 'adscripcion', 'adscripcion_homologada2',
    'nombre', 'apellido_pat', 'apellido_mat', 'nombre_com', 'genero', 'rfc', 'edad', 'numero_emp', 'opi', 'concepto_58', 'apoyo', 'consecutivo_plaza', 'codigo_plaza',
    'nivel', 'tipo_personal', 'categoria_nivel', 'puesto_plaza', 'puesto', 'fecha_ingreso', 'antigüedad', 'folio_asignatura', 'consecutivo_inm', 'clave_programacion',
    'expediente', 'nombre_evento', 'nombre_evento2', 'cat_bloque', 'bloque', 'seccion', 'programa', 'subprograma', 'evento_pac', 'categoria', 'fecha_inicio', 'fecha_fin',
    'horas', 'faltas', 'pais_sede', 'estado_sede', 'sede', 'salon', 'accion_capacitacion', 'evento', 'tipo_competencias', 'competencias', 'modalidad', 'modalidad2',
    'asignacion_normativa', 'estatus', 'evento_migrado', 'costo_aprox', 'costo_ajust', 'calificacion_inicial', 'calificacion_final', 'estatus_acreditacion', 'estatus acreditacion2',
    'estatus_inscripcion', 'coordinador', 'coordinador_numemp', 'coordinador2', 'corordinador_numemp2', 'instructores', 'procedencias', 'instructores_externos', 'procedencias_extenas',
    'mes_reporte', 'pais_procedencia', 'tipo_pais', 'codigos_emp', 'dsespecifica_descripcion', 'temas_legalidad_dh', 'duracion2', 'fecha_cierre', 'periodo', 'historico', 'motivo');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){        
        $lineData = array($row['registro'], $row['anio'], $row['movimiento'], $row['acronimo'], $row['procedencia'], $row['lugar_nacimiento'], $row['tipo_ads'], $row['adscripcion'],
        $row['adscripcion_homologada2'], $row['nombre'], $row['apellido_pat'], $row['apellido_mat'], $row['nombre_com'], $row['genero'], $row['rfc'], $row['edad'], $row['numero_emp'], $row['opi'],
        $row['concepto_58'], $row['apoyo'], $row['consecutivo_plaza'], $row['codigo_plaza'], $row['nivel'], $row['tipo_personal'], $row['categoria_nivel'], $row['puesto_plaza'], $row['puesto'], 
        $row['fecha_ingreso'], $row['antigüedad'], $row['folio_asignatura'], $row['consecutivo_inm'], $row['clave_programacion'], $row['expediente'], $row['nombre_evento'], $row['nombre_evento2'], 
        $row['cat_bloque'], $row['bloque'], $row['seccion'], $row['programa'], $row['subprograma'], $row['evento_pac'], $row['categoria'], $row['fecha_inicio'], $row['fecha_fin'], $row['horas'], 
        $row['faltas'], $row['pais_sede'], $row['estado_sede'], $row['sede'], $row['salon'], $row['accion_capacitacion'], $row['evento'], $row['tipo_competencias'], $row['competencias'], 
        $row['modalidad'], $row['modalidad2'], $row['asignacion_normativa'], $row['estatus'], $row['evento_migrado'], $row['costo_aprox'], $row['costo_ajust'], $row['calificacion_inicial'],
        $row['calificacion_final'], $row['estatus_acreditacion'], $row['estatus_acreditacion2'], $row['estatus_inscripcion'], $row['coordinador'], $row['coordinador_numemp'], $row['coordinador2'],
        $row['corordinador_numemp2'], $row['instructores'], $row['procedencias'], $row['instructores_externos'], $row['procedencias_extenas'], $row['mes_reporte'], $row['pais_procedencia'],
        $row['tipo_pais'], $row['codigos_emp'], $row['dsespecifica_descripcion'], $row['temas_legalidad_dh'], $row['duracion2'], $row['fecha_cierre'], $row['periodo'], $row['historico'], $row['motivo']);
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