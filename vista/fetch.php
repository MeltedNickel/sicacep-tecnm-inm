<?php

//fetch.php

$conn = new PDO("mysql:host=localhost;dbname=historico", "root", "");

$column = array("registro","anio","movimiento","acronimo","procedencia","lugar_nacimiento","tipo_ads","adscripcion","adscripcion_homologada2","nombre","apellido_pat","apellido_mat","nombre_com","genero","rfc","edad","numero_emp","opi","concepto_58","apoyo","consecutivo_plaza","codigo_plaza","nivel","tipo_personal","categoria_nivel","puesto_plaza","puesto","fecha_ingreso","antigüedad","folio_asignatura","consecutivo_inm","clave_programacion","expediente","nombre_evento","nombre_evento2","cat_bloque","bloque","seccion","programa","subprograma","evento_pac","categoria","fecha_inicio","fecha_fin","horas","faltas","pais_sede","estado_sede","sede","salon","accion_capacitacion","evento","tipo_competencias","competencias","modalidad","modalidad2","asignacion_normativa","estatus","evento_migrado","costo_aprox","costo_ajust","calificacion_inicial","calificacion_final","estatus_acreditacion","estatus_acreditacion2","estatus_inscripcion","coordinador","coordinador_numemp","coordinador2","corordinador_numemp2","instructores","procedencias","instructores_externos","procedencias_extenas","mes_reporte","pais_procedencia","tipo_pais","codigos_emp","dsespecifica_descripcion","temas_legalidad_dh","duracion2","fecha_cierre","periodo","historico","motivo");

$query = "SELECT * FROM homologada ";

if(isset($_POST["search"]["value"]))
{
	$query .= '
	WHERE registro LIKE "%'.$_POST["search"]["value"].'%"	
    OR anio LIKE "%'.$_POST["search"]["value"].'%"
    OR movimiento LIKE "%'.$_POST["search"]["value"].'%"
    OR acronimo LIKE "%'.$_POST["search"]["value"].'%"
    OR procedencia LIKE "%'.$_POST["search"]["value"].'%"
    OR lugar_nacimiento LIKE "%'.$_POST["search"]["value"].'%"
    OR tipo_ads LIKE "%'.$_POST["search"]["value"].'%"
    OR adscripcion LIKE "%'.$_POST["search"]["value"].'%"
    OR adscripcion_homologada2 LIKE "%'.$_POST["search"]["value"].'%"
    OR nombre LIKE "%'.$_POST["search"]["value"].'%"
    OR apellido_pat LIKE "%'.$_POST["search"]["value"].'%"
    OR apellido_mat LIKE "%'.$_POST["search"]["value"].'%"
    OR nombre_com LIKE "%'.$_POST["search"]["value"].'%"
    OR genero LIKE "%'.$_POST["search"]["value"].'%"
    OR rfc LIKE "%'.$_POST["search"]["value"].'%"
    OR edad LIKE "%'.$_POST["search"]["value"].'%"
    OR numero_emp LIKE "%'.$_POST["search"]["value"].'%"
    OR opi LIKE "%'.$_POST["search"]["value"].'%"
    OR concepto_58 LIKE "%'.$_POST["search"]["value"].'%"
    OR apoyo LIKE "%'.$_POST["search"]["value"].'%"
    OR consecutivo_plaza LIKE "%'.$_POST["search"]["value"].'%"
    OR codigo_plaza LIKE "%'.$_POST["search"]["value"].'%"
    OR nivel LIKE "%'.$_POST["search"]["value"].'%"
    OR tipo_personal LIKE "%'.$_POST["search"]["value"].'%"
    OR categoria_nivel LIKE "%'.$_POST["search"]["value"].'%"
    OR puesto_plaza LIKE "%'.$_POST["search"]["value"].'%"
    OR puesto LIKE "%'.$_POST["search"]["value"].'%"
    OR fecha_ingreso LIKE "%'.$_POST["search"]["value"].'%"
    OR antigüedad LIKE "%'.$_POST["search"]["value"].'%"
    OR folio_asignatura LIKE "%'.$_POST["search"]["value"].'%"
    OR consecutivo_inm LIKE "%'.$_POST["search"]["value"].'%"
    OR clave_programacion LIKE "%'.$_POST["search"]["value"].'%"
    OR expediente LIKE "%'.$_POST["search"]["value"].'%"
    OR nombre_evento LIKE "%'.$_POST["search"]["value"].'%"
    OR nombre_evento2 LIKE "%'.$_POST["search"]["value"].'%"
    OR cat_bloque LIKE "%'.$_POST["search"]["value"].'%"
    OR bloque LIKE "%'.$_POST["search"]["value"].'%"
    OR seccion LIKE "%'.$_POST["search"]["value"].'%"
    OR programa LIKE "%'.$_POST["search"]["value"].'%"
    OR subprograma LIKE "%'.$_POST["search"]["value"].'%"
    OR evento_pac LIKE "%'.$_POST["search"]["value"].'%"
    OR categoria LIKE "%'.$_POST["search"]["value"].'%"
    OR fecha_inicio LIKE "%'.$_POST["search"]["value"].'%"
    OR fecha_fin LIKE "%'.$_POST["search"]["value"].'%"
    OR horas LIKE "%'.$_POST["search"]["value"].'%"
    OR faltas LIKE "%'.$_POST["search"]["value"].'%"
    OR pais_sede LIKE "%'.$_POST["search"]["value"].'%"
    OR estado_sede LIKE "%'.$_POST["search"]["value"].'%"
    OR sede LIKE "%'.$_POST["search"]["value"].'%"
    OR salon LIKE "%'.$_POST["search"]["value"].'%"
    OR accion_capacitacion LIKE "%'.$_POST["search"]["value"].'%"
    OR evento LIKE "%'.$_POST["search"]["value"].'%"
    OR tipo_competencias LIKE "%'.$_POST["search"]["value"].'%"
    OR competencias LIKE "%'.$_POST["search"]["value"].'%"
    OR modalidad LIKE "%'.$_POST["search"]["value"].'%"
    OR modalidad2 LIKE "%'.$_POST["search"]["value"].'%"
    OR asignacion_normativa LIKE "%'.$_POST["search"]["value"].'%"
    OR estatus LIKE "%'.$_POST["search"]["value"].'%"
    OR evento_migrado LIKE "%'.$_POST["search"]["value"].'%"
    OR costo_aprox LIKE "%'.$_POST["search"]["value"].'%"
    OR costo_ajust LIKE "%'.$_POST["search"]["value"].'%"
    OR calificacion_inicial LIKE "%'.$_POST["search"]["value"].'%"
    OR calificacion_final LIKE "%'.$_POST["search"]["value"].'%"
    OR estatus_acreditacion LIKE "%'.$_POST["search"]["value"].'%"
    OR estatus_acreditacion2 LIKE "%'.$_POST["search"]["value"].'%"
    OR estatus_inscripcion LIKE "%'.$_POST["search"]["value"].'%"
    OR coordinador LIKE "%'.$_POST["search"]["value"].'%"
    OR coordinador_numemp LIKE "%'.$_POST["search"]["value"].'%"
    OR coordinador2 LIKE "%'.$_POST["search"]["value"].'%"
    OR corordinador_numemp2 LIKE "%'.$_POST["search"]["value"].'%"
    OR instructores LIKE "%'.$_POST["search"]["value"].'%"
    OR procedencias LIKE "%'.$_POST["search"]["value"].'%"
    OR instructores_externos LIKE "%'.$_POST["search"]["value"].'%"
    OR procedencias_extenas LIKE "%'.$_POST["search"]["value"].'%"
    OR mes_reporte LIKE "%'.$_POST["search"]["value"].'%"
    OR pais_procedencia LIKE "%'.$_POST["search"]["value"].'%"
    OR tipo_pais LIKE "%'.$_POST["search"]["value"].'%"
    OR codigos_emp LIKE "%'.$_POST["search"]["value"].'%"
    OR dsespecifica_descripcion LIKE "%'.$_POST["search"]["value"].'%"
    OR temas_legalidad_dh LIKE "%'.$_POST["search"]["value"].'%"
    OR duracion2 LIKE "%'.$_POST["search"]["value"].'%"
    OR fecha_cierre LIKE "%'.$_POST["search"]["value"].'%"
    OR periodo LIKE "%'.$_POST["search"]["value"].'%"
    OR historico LIKE "%'.$_POST["search"]["value"].'%"
    OR motivo LIKE "%'.$_POST["search"]["value"].'%"
    ';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY registro ASC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
	$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $conn->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$result = $conn->query($query . $query1);

$data = array();

foreach($result as $row)
{
	$sub_array = array();
    $sub_array[] = $row['registro'];
    $sub_array[] = $row['anio'];
    $sub_array[] = $row['movimiento'];
    $sub_array[] = $row['acronimo'];
    $sub_array[] = $row['procedencia'];
    $sub_array[] = $row['lugar_nacimiento'];
    $sub_array[] = $row['tipo_ads'];
    $sub_array[] = $row['adscripcion'];
    $sub_array[] = $row['adscripcion_homologada2'];
    $sub_array[] = $row['nombre'];
    $sub_array[] = $row['apellido_pat'];
    $sub_array[] = $row['apellido_mat'];
    $sub_array[] = $row['nombre_com'];
    $sub_array[] = $row['genero'];
    $sub_array[] = $row['rfc'];
    $sub_array[] = $row['edad'];
    $sub_array[] = $row['numero_emp'];
    $sub_array[] = $row['opi'];
    $sub_array[] = $row['concepto_58'];
    $sub_array[] = $row['apoyo'];
    $sub_array[] = $row['consecutivo_plaza'];
    $sub_array[] = $row['codigo_plaza'];
    $sub_array[] = $row['nivel'];
    $sub_array[] = $row['tipo_personal'];
    $sub_array[] = $row['categoria_nivel'];
    $sub_array[] = $row['puesto_plaza'];
    $sub_array[] = $row['puesto'];
    $sub_array[] = $row['fecha_ingreso'];
    $sub_array[] = $row['antigüedad'];
    $sub_array[] = $row['folio_asignatura'];
    $sub_array[] = $row['consecutivo_inm'];
    $sub_array[] = $row['clave_programacion'];
    $sub_array[] = $row['expediente'];
    $sub_array[] = $row['nombre_evento'];
    $sub_array[] = $row['nombre_evento2'];
    $sub_array[] = $row['cat_bloque'];
    $sub_array[] = $row['bloque'];
    $sub_array[] = $row['seccion'];
    $sub_array[] = $row['programa'];
    $sub_array[] = $row['subprograma'];
    $sub_array[] = $row['evento_pac'];
    $sub_array[] = $row['categoria'];
    $sub_array[] = $row['fecha_inicio'];
    $sub_array[] = $row['fecha_fin'];
    $sub_array[] = $row['horas'];
    $sub_array[] = $row['faltas'];
    $sub_array[] = $row['pais_sede'];
    $sub_array[] = $row['estado_sede'];
    $sub_array[] = $row['sede'];
    $sub_array[] = $row['salon'];
    $sub_array[] = $row['accion_capacitacion'];
    $sub_array[] = $row['evento'];
    $sub_array[] = $row['tipo_competencias'];
    $sub_array[] = $row['competencias'];
    $sub_array[] = $row['modalidad'];
    $sub_array[] = $row['modalidad2'];
    $sub_array[] = $row['asignacion_normativa'];
    $sub_array[] = $row['estatus'];
    $sub_array[] = $row['evento_migrado'];
    $sub_array[] = $row['costo_aprox'];
    $sub_array[] = $row['costo_ajust'];
    $sub_array[] = $row['calificacion_inicial'];
    $sub_array[] = $row['calificacion_final'];
    $sub_array[] = $row['estatus_acreditacion'];
    $sub_array[] = $row['estatus_acreditacion2'];
    $sub_array[] = $row['estatus_inscripcion'];
    $sub_array[] = $row['coordinador'];
    $sub_array[] = $row['coordinador_numemp'];
    $sub_array[] = $row['coordinador2'];
    $sub_array[] = $row['corordinador_numemp2'];
    $sub_array[] = $row['instructores'];
    $sub_array[] = $row['procedencias'];
    $sub_array[] = $row['instructores_externos'];
    $sub_array[] = $row['procedencias_extenas'];
    $sub_array[] = $row['mes_reporte'];
    $sub_array[] = $row['pais_procedencia'];
    $sub_array[] = $row['tipo_pais'];
    $sub_array[] = $row['codigos_emp'];
    $sub_array[] = $row['dsespecifica_descripcion'];
    $sub_array[] = $row['temas_legalidad_dh'];
    $sub_array[] = $row['duracion2'];
    $sub_array[] = $row['fecha_cierre'];
    $sub_array[] = $row['periodo'];
    $sub_array[] = $row['historico'];
    $sub_array[] = $row['motivo'];
	$data[] = $sub_array;
}

function count_all_data($conn)
{
	$query = "SELECT * FROM homologada";

	$statement = $conn->prepare($query);

	$statement->execute();

	return $statement->rowCount();
}

$output = array(
	"draw"		=>	intval($_POST["draw"]),
	"recordsTotal"	=>	count_all_data($conn),
	"recordsFiltered"	=>	$number_filter_row,
	"data"	=>	$data
);

echo json_encode($output);

?>