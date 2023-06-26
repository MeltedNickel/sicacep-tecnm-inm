<?php
require 'config.php';

 /* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['STATUS', 'ADSCRIPCION_FISICA', 'PUESTO_ESPECIFICO', 'PUESTO_GENERICO',
'NIVEL_ACTUAL', 'NUM_EMPLEADO', 'NOMBRE', 'RFC', 'CURP',
'FECHA_DE_INGRESO_INAMI','FECHA_INGRESO_A_LA_PLAZA', 'TIPO_DE_PLAZA'];

 /* Nombre de la tabla */
 $table = "pac01042023";
 $id= 'NUM_EMPLEADO';
 
 $campo = isset($_POST['campo']) ? $con->real_escape_string($_POST['campo']) : null;


/* Filtrado */
$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}

/* Limit */
$limit = isset($_POST['registros']) ? $con->real_escape_string($_POST['registros']) : 10;
$pagina = isset($_POST['pagina']) ? $con->real_escape_string($_POST['pagina']) : 0;

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit = "LIMIT $inicio , $limit";

/**
 * Ordenamiento
 */

 $sOrder = "";
 if(isset($_POST['orderCol'])){
    $orderCol = $_POST['orderCol'];
    $oderType = isset($_POST['orderType']) ? $_POST['orderType'] : 'asc';
    
    $sOrder = "ORDER BY ". $columns[intval($orderCol)] . ' ' . $oderType;
 }


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where
$sOrder
$sLimit";
$resultado = $con->query($sql);
$num_rows = $resultado->num_rows;

/* Consulta para total de registro filtrados */
$sqlFiltro = "SELECT FOUND_ROWS()";
$resFiltro = $con->query($sqlFiltro);
$row_filtro = $resFiltro->fetch_array();
$totalFiltro = $row_filtro[0];

/* Consulta para total de registro filtrados */
$sqlTotal = "SELECT count($id) FROM $table ";
$resTotal = $con->query($sqlTotal);
$row_total = $resTotal->fetch_array();
$totalRegistros = $row_total[0];

/* Mostrado resultados */
$output = [];
$output['totalRegistros'] = $totalRegistros;
$output['totalFiltro'] = $totalFiltro;
$output['data'] = '';
$output['paginacion'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $output['data'] .= '<tr>';
        $output['data'] .= '<td>' . $row['STATUS'] . '</td>';
        $output['data'] .= '<td>' . $row['ADSCRIPCION_FISICA'] . '</td>';
        $output['data'] .= '<td>' . $row['PUESTO_ESPECIFICO'] . '</td>';
        $output['data'] .= '<td>' . $row['PUESTO_GENERICO'] . '</td>';
        $output['data'] .= '<td>' . $row['NIVEL_ACTUAL'] . '</td>';
        $output['data'] .= '<td>' . $row['NUM_EMPLEADO'] . '</td>';
        $output['data'] .= '<td>' . $row['NOMBRE'] . '</td>';
        $output['data'] .= '<td>' . $row['RFC'] . '</td>';
        $output['data'] .= '<td>' . $row['CURP'] . '</td>';
        $output['data'] .= '<td>' . $row['FECHA_DE_INGRESO_INAMI'] . '</td>';
        $output['data'] .= '<td>' . $row['FECHA_INGRESO_A_LA_PLAZA'] . '</td>';
        $output['data'] .= '<td>' . $row['TIPO_DE_PLAZA'] . '</td>';
        $output['data'] .= '<td><a class="btn btn-warning btn-sm" href="editar.php?id=' . $row['NUM_EMPLEADO'] . '">Editar</a></td>';
        $output['data'] .= "<td><a class='btn btn-danger btn-sm' href='elimiar.php?id=" . $row['NUM_EMPLEADO'] . "'>Eliminar</a></td>";
        $output['data'] .= '</tr>';
    }
    }else{
        $output['data'] .= '<tr>';
        $output['data'] .= '<td colspan="7">Sin resultados</td>';
        $output['data'] .= '</tr>';
    }

    if ($output['totalRegistros'] > 0) {
        $totalPaginas = ceil($output['totalRegistros'] / $limit);

        $output['paginacion'] .= '<nav>';
        $output['paginacion'] .= '<ul class="pagination">';

        $numeroInicio = 1;

        if(($pagina - 4) > 1){
            $numeroInicio = $pagina - 4;
        }

        $numeroFin = $numeroInicio + 9;

        if($numeroFin > $totalPaginas){
            $numeroFin = $totalPaginas;
        }

        for ($i = $numeroInicio; $i <= $numeroFin; $i++) {
            if ($pagina == $i) {
                $output['paginacion'] .= '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
            } else {
                $output['paginacion'] .= '<li class="page-item"><a class="page-link" href="#" onclick="nextPage(' . $i . ')">' . $i . '</a></li>';
            }
        }

        $output['paginacion'] .= '</ul>';
        $output['paginacion'] .= '</nav>';
    }
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>