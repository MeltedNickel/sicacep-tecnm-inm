<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Capacitación, Certificación y Profesionalización</title>

    <link href="../recursos/css/cdn.jsdelivr.net_npm_bootstrap-select@1.13.18_dist_css_bootstrap-select.min.css" rel="stylesheet" >
    <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
    <link href="../recursos/css/all.min.css" rel="stylesheet">
    <link href="../recursos/css/style.css" rel="stylesheet">
   
</head>
<body>
    <?php include "navbar.php";?>
    <div class="container-fluid p-4">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-center">        
                    <div class="col-auto">
                        <a href="#" class="btn btn-dark" style="background-color: #d63384; border-color: #d63384;" data-bs-toggle="modal" data-bs-target="#importaModal"><i class="fa-solid fa-upload"></i> Importar archivo CSV</a>
                    </div>

                    <div class="col-auto">
                        <a href="exporta_homologada.php" class="btn btn-dark" style="background-color: #6610f2; border-color: #6610f2;"><i class="fa-solid fa-download"></i> Exportar archivo CSV</a>
                    </div>                    
                    
                    <div class="col-auto">
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#vaciaModal"><i class="fa-solid fa-trash"></i> Eliminar todos los registro</a>
                    </div>
                </div>                
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col-9">
                        filtrar datos por columnas:
                    </div>
                    <div class="col-3">
                        <select name="column_name" id="column_name" class="form-control selectpicker" multiple>								
                            <option value="0">registro</option>
                            <option value="1">anio</option>
                            <option value="2">movimiento</option>
                            <option value="3">acronimo</option>
                            <option value="4">procedencia</option>
                            <option value="5">lugar_nacimiento</option>
                            <option value="6">tipo_ads</option>
                            <option value="7">adscripcion</option>
                            <option value="8">adscripcion_homologada2</option>
                            <option value="9">nombre</option>
                            <option value="10">apellido_pat</option>
                            <option value="11">apellido_mat</option>
                            <option value="12">nombre_com</option>
                            <option value="13">genero</option>
                            <option value="14">rfc</option>
                            <option value="15">edad</option>
                            <option value="16">numero_emp</option>
                            <option value="17">opi</option>
                            <option value="18">concepto_58</option>
                            <option value="19">apoyo</option>
                            <option value="20">consecutivo_plaza</option>
                            <option value="21">codigo_plaza</option>
                            <option value="22">nivel</option>
                            <option value="23">tipo_personal</option>
                            <option value="24">categoria_nivel</option>
                            <option value="25">puesto_plaza</option>
                            <option value="26">puesto</option>
                            <option value="27">fecha_ingreso</option>
                            <option value="28">antigüedad</option>
                            <option value="29">folio_asignatura</option>
                            <option value="30">consecutivo_inm</option>
                            <option value="31">clave_programacion</option>
                            <option value="32">expediente</option>
                            <option value="33">nombre_evento</option>
                            <option value="34">nombre_evento2</option>
                            <option value="35">cat_bloque</option>
                            <option value="36">bloque</option>
                            <option value="37">seccion</option>
                            <option value="38">programa</option>
                            <option value="39">subprograma</option>
                            <option value="40">evento_pac</option>
                            <option value="41">categoria</option>
                            <option value="42">fecha_inicio</option>
                            <option value="43">fecha_fin</option>
                            <option value="44">horas</option>
                            <option value="45">faltas</option>
                            <option value="46">pais_sede</option>
                            <option value="47">estado_sede</option>
                            <option value="48">sede</option>
                            <option value="49">salon</option>
                            <option value="50">accion_capacitacion</option>
                            <option value="51">evento</option>
                            <option value="52">tipo_competencias</option>
                            <option value="53">competencias</option>
                            <option value="54">modalidad</option>
                            <option value="55">modalidad2</option>
                            <option value="56">asignacion_normativa</option>
                            <option value="57">estatus</option>
                            <option value="58">evento_migrado</option>
                            <option value="59">costo_aprox</option>
                            <option value="60">costo_ajust</option>
                            <option value="61">calificacion_inicial</option>
                            <option value="62">calificacion_final</option>
                            <option value="63">estatus_acreditacion</option>
                            <option value="64">estatus_acreditacion2</option>
                            <option value="65">estatus_inscripcion</option>
                            <option value="66">coordinador</option>
                            <option value="67">coordinador_numemp</option>
                            <option value="68">coordinador2</option>
                            <option value="69">corordinador_numemp2</option>
                            <option value="70">instructores</option>
                            <option value="71">procedencias</option>
                            <option value="72">instructores_externos</option>
                            <option value="73">procedencias_extenas</option>
                            <option value="74">mes_reporte</option>
                            <option value="75">pais_procedencia</option>
                            <option value="76">tipo_pais</option>
                            <option value="77">codigos_emp</option>
                            <option value="78">dsespecifica_descripcion</option>
                            <option value="79">temas_legalidad_dh</option>
                            <option value="80">duracion2</option>
                            <option value="81">fecha_cierre</option>
                            <option value="82">periodo</option>
                            <option value="83">historico</option>
                            <option value="84">motivo</option>
                        </select>                   
                    </div>              
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-bordered table-hover" id="sample_data">
                        <thead class="table-primary">
                            <tr>									
                                <th>registro</th>
                                <th>anio</th>
                                <th>movimiento</th>
                                <th>acronimo</th>
                                <th>procedencia</th>
                                <th>lugar_nacimiento</th>
                                <th>tipo_ads</th>
                                <th>adscripcion</th>
                                <th>adscripcion_homologada2</th>
                                <th>nombre</th>
                                <th>apellido_pat</th>
                                <th>apellido_mat</th>
                                <th>nombre_com</th>
                                <th>genero</th>
                                <th>rfc</th>
                                <th>edad</th>
                                <th>numero_emp</th>
                                <th>opi</th>
                                <th>concepto_58</th>
                                <th>apoyo</th>
                                <th>consecutivo_plaza</th>
                                <th>codigo_plaza</th>
                                <th>nivel</th>
                                <th>tipo_personal</th>
                                <th>categoria_nivel</th>
                                <th>puesto_plaza</th>
                                <th>puesto</th>
                                <th>fecha_ingreso</th>
                                <th>antigüedad</th>
                                <th>folio_asignatura</th>
                                <th>consecutivo_inm</th>
                                <th>clave_programacion</th>
                                <th>expediente</th>
                                <th>nombre_evento</th>
                                <th>nombre_evento2</th>
                                <th>cat_bloque</th>
                                <th>bloque</th>
                                <th>seccion</th>
                                <th>programa</th>
                                <th>subprograma</th>
                                <th>evento_pac</th>
                                <th>categoria</th>
                                <th>fecha_inicio</th>
                                <th>fecha_fin</th>
                                <th>horas</th>
                                <th>faltas</th>
                                <th>pais_sede</th>
                                <th>estado_sede</th>
                                <th>sede</th>
                                <th>salon</th>
                                <th>accion_capacitacion</th>
                                <th>evento</th>
                                <th>tipo_competencias</th>
                                <th>competencias</th>
                                <th>modalidad</th>
                                <th>modalidad2</th>
                                <th>asignacion_normativa</th>
                                <th>estatus</th>
                                <th>evento_migrado</th>
                                <th>costo_aprox</th>
                                <th>costo_ajust</th>
                                <th>calificacion_inicial</th>
                                <th>calificacion_final</th>
                                <th>estatus_acreditacion</th>
                                <th>estatus_acreditacion2</th>
                                <th>estatus_inscripcion</th>
                                <th>coordinador</th>
                                <th>coordinador_numemp</th>
                                <th>coordinador2</th>
                                <th>corordinador_numemp2</th>
                                <th>instructores</th>
                                <th>procedencias</th>
                                <th>instructores_externos</th>
                                <th>procedencias_extenas</th>
                                <th>mes_reporte</th>
                                <th>pais_procedencia</th>
                                <th>tipo_pais</th>
                                <th>codigos_emp</th>
                                <th>dsespecifica_descripcion</th>
                                <th>temas_legalidad_dh</th>
                                <th>duracion2</th>
                                <th>fecha_cierre</th>
                                <th>periodo</th>
                                <th>historico</th>
                                <th>motivo</th>
                            </tr>                          
                        </thead>                            
                    </table>
                </div> 
            </div>
        </div>  
    </div>        
    <?php include 'importaHologadaModal.php'; ?>
    <?php include 'vaciaHomologadaModal.php'; ?>    
    
    <script src="../recursos/js/all.min.js"></script>
    <script src="../recursos/js/code.jquery.com_jquery-3.5.1.js"></script>
    <script src="../recursos/js/cdn.jsdelivr.net_npm_popper.js@1.16.1_dist_umd_popper.min.js"></script>
    <script src="../recursos/js/stackpath.bootstrapcdn.com_bootstrap_4.5.2_js_bootstrap.min.js"></script>    
    <script src="../recursos/js/cdn.jsdelivr.net_npm_bootstrap-select@1.13.18_dist_js_bootstrap-select.min.js"></script>
    <script src="../recursos/js/cdn.datatables.net_1.13.4_js_jquery.dataTables.min.js"></script>
    <script src="../recursos/js/cdn.datatables.net_1.13.4_js_dataTables.bootstrap5.min.js"></script>	    
    <script src="../recursos/js/bootstrap.bundle.min.js"></script>    
    <script src="../recursos/js/homologada.js"></script>
<?php include "footer.php";?>
<?php include "social-networks-icons.php";?>
</body>
</html>