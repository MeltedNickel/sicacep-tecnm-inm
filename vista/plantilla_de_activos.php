<?php
    require 'database.php';

    $sqlTabla = "SELECT p.id, p.adscripcion_fisica, p.puesto_especifico, p.puesto_generico, p.codigo_plaza_actual, p.nivel_actual, p.num_empleado, p.nombre, p.rfc, p.curp, p.fecha_ingreso_inami, p.fecha_ingreso_plaza, p.tipo_de_plaza, p.fecha_mov, g.estado AS estatus FROM tabla as p
    INNER JOIN estatus as g ON p.id_estatus = g.id";
    $tabla = $conn->query($sqlTabla);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Capacitación, Certificación y Profesionalización</title>

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
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-solid fa-circle-plus"></i> Nuevo registro</a>
                    </div>
        
                    <div class="col-auto">
                        <a href="#" class="btn btn-dark" style="background-color: #d63384; border-color: #d63384;" data-bs-toggle="modal" data-bs-target="#importaModal"><i class="fa-solid fa-upload"></i> Importar archivo CSV</a>
                    </div>
        
                    <div class="col-auto">
                        <a href="exporta.php" class="btn btn-dark" style="background-color: #6610f2; border-color: #6610f2;"><i class="fa-solid fa-download"></i> Exportar archivo CSV</a>
                    </div>
                            
                    <div class="col-auto">
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#vaciaModal"><i class="fa-solid fa-trash"></i> Eliminar todos los registro</a>
                    </div>
                </div>                
            </div>
            <div class="card-body" style="zoom:70%;">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-bordered table-hover" id="example">
                        <thead class="table-primary">
                            <tr>
                                <th>status</th>
                                <th>adscripcion_fisica</th>
                                <th>puesto_especifico</th>
                                <th>puesto_generico</th>
                                <th>codigo_plaza_actual</th>
                                <th>nivel_actual</th>
                                <th>num_empleado</th>
                                <th>nombre</th>
                                <th>RFC</th>
                                <th>CURP</th>
                                <th>fecha_ingreso_inami</th>
                                <th>fecha_ingreso_plaza</th>
                                <th>tipo_de_plaza</th>
                                <th>fecha_mov</th>
                                <th>acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row_tabla = $tabla->fetch_assoc()){ ?>
                                <tr>
                                    <td><?= $row_tabla['estatus'];?></td>
                                    <td><?= $row_tabla['adscripcion_fisica'];?></td>
                                    <td><?= $row_tabla['puesto_especifico'];?></td>
                                    <td><?= $row_tabla['puesto_generico'];?></td>
                                    <td><?= $row_tabla['codigo_plaza_actual'];?></td>
                                    <td><?= $row_tabla['nivel_actual'];?></td>
                                    <td><?= $row_tabla['num_empleado'];?></td>
                                    <td><?= $row_tabla['nombre'];?></td>
                                    <td><?= $row_tabla['rfc'];?></td>
                                    <td><?= $row_tabla['curp'];?></td>
                                    <td><?= $row_tabla['fecha_ingreso_inami'];?></td>
                                    <td><?= $row_tabla['fecha_ingreso_plaza'];?></td>
                                    <td><?= $row_tabla['tipo_de_plaza'];?></td>
                                    <td><?= $row_tabla['fecha_mov'];?></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?= $row_tabla['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-id="<?= $row_tabla['id']; ?>"><i class="fa-solid fa-trash"></i> Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
    <?php 
    $sqlEstatus = "SELECT id, estado FROM estatus";
    $estatus = $conn->query($sqlEstatus);
    ?>
    <?php include 'nuevoModal.php'; ?>
    <?php include 'importaModal.php'; ?>
    <?php include 'vaciaModal.php'; ?>
    <?php $estatus->data_seek(0); ?>
    <?php include 'editaModal.php'; ?>
    <?php include 'eliminaModal.php'; ?>
    <script>
    let nuevoModal = document.getElementById('nuevoModal')
    let editaModal = document.getElementById('editaModal')
    let eliminaModal = document.getElementById('eliminaModal')

    nuevoModal.addEventListener('shown.bs.modal', event => {
        nuevoModal.querySelector('.modal-body #estatus').focus()
    })

    nuevoModal.addEventListener('hide.bs.modal', event => {
        nuevoModal.querySelector('.modal-body #estatus').value = ""
        nuevoModal.querySelector('.modal-body #adscripcion_fisica').value = ""
        nuevoModal.querySelector('.modal-body #puesto_especifico').value = ""
        nuevoModal.querySelector('.modal-body #puesto_generico').value = ""
        nuevoModal.querySelector('.modal-body #codigo_plaza_actual').value = ""
        nuevoModal.querySelector('.modal-body #nivel_actual').value = ""
        nuevoModal.querySelector('.modal-body #num_empleado').value = ""
        nuevoModal.querySelector('.modal-body #nombre').value = ""
        nuevoModal.querySelector('.modal-body #rfc').value = ""
        nuevoModal.querySelector('.modal-body #curp').value = ""
        nuevoModal.querySelector('.modal-body #fecha_ingreso_inami').value = ""
        nuevoModal.querySelector('.modal-body #fecha_ingreso_plaza').value = ""
        nuevoModal.querySelector('.modal-body #tipo_de_plaza').value = ""
    })

    editaModal.addEventListener('hide.bs.modal', event => {
        editaModal.querySelector('.modal-body #estatus').value = ""
        editaModal.querySelector('.modal-body #adscripcion_fisica').value = ""
        editaModal.querySelector('.modal-body #puesto_especifico').value = ""
        editaModal.querySelector('.modal-body #puesto_generico').value = ""
        editaModal.querySelector('.modal-body #codigo_plaza_actual').value = ""
        editaModal.querySelector('.modal-body #nivel_actual').value = ""
        editaModal.querySelector('.modal-body #num_empleado').value = ""
        editaModal.querySelector('.modal-body #nombre').value = ""
        editaModal.querySelector('.modal-body #rfc').value = ""
        editaModal.querySelector('.modal-body #curp').value = ""
        editaModal.querySelector('.modal-body #fecha_ingreso_inami').value = ""
        editaModal.querySelector('.modal-body #fecha_ingreso_plaza').value = ""
        editaModal.querySelector('.modal-body #tipo_de_plaza').value = ""
    })
    
    editaModal.addEventListener('shown.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        
        let inputId = editaModal.querySelector('.modal-body #id')
        let inputEstatus = editaModal.querySelector('.modal-body #estatus')
        let adscripcion_fisica = editaModal.querySelector('.modal-body #adscripcion_fisica')
        let puesto_especifico = editaModal.querySelector('.modal-body #puesto_especifico')
        let puesto_generico = editaModal.querySelector('.modal-body #puesto_generico')
        let codigo_plaza_actual = editaModal.querySelector('.modal-body #codigo_plaza_actual')
        let nivel_actual = editaModal.querySelector('.modal-body #nivel_actual')
        let num_empleado = editaModal.querySelector('.modal-body #num_empleado')
        let inputnombre = editaModal.querySelector('.modal-body #nombre')
        let inputRFC = editaModal.querySelector('.modal-body #rfc')
        let inputCURP = editaModal.querySelector('.modal-body #curp')
        let fecha_ingreso_inami = editaModal.querySelector('.modal-body #fecha_ingreso_inami')
        let fecha_ingreso_plaza = editaModal.querySelector('.modal-body #fecha_ingreso_plaza')
        let tipo_de_plaza = editaModal.querySelector('.modal-body #tipo_de_plaza')
        

        let url = "getTabla.php"
        let formData = new FormData()
        formData.append('id', id)

        fetch(url, {
                method: "POST",
                body: formData
            }).then(response => response.json())
            .then(data => {

                inputId.value = data.id
                inputEstatus.value = data.id_estatus
                adscripcion_fisica.value = data.adscripcion_fisica
                puesto_especifico.value = data.puesto_especifico
                puesto_generico.value = data.puesto_generico
                codigo_plaza_actual.value = data.codigo_plaza_actual
                nivel_actual.value = data.nivel_actual
                num_empleado.value = data.num_empleado
                inputnombre.value = data.nombre
                inputRFC.value = data.rfc
                inputCURP.value = data.curp
                fecha_ingreso_inami.value = data.fecha_ingreso_inami
                fecha_ingreso_plaza.value = data.fecha_ingreso_plaza
                tipo_de_plaza.value = data.tipo_de_plaza

            }).catch(err => console.log(err))
    })
    eliminaModal.addEventListener('shown.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        eliminaModal.querySelector('.modal-footer #id').value = id
    })
</script>

<script src="../recursos/js/all.min.js"></script>
<script src="../recursos/js/bootstrap.bundle.min.js"></script>
<script src="../recursos/js/code.jquery.com_jquery-3.5.1.js"></script>
<script src="../recursos/js/cdn.datatables.net_1.13.4_js_jquery.dataTables.min.js"></script>
<script src="../recursos/js/cdn.datatables.net_1.13.4_js_dataTables.bootstrap5.min.js"></script>
<script src="../recursos/js/plantilla_de_activos.js"></script>

<?php include "footer.php";?>
<?php include "social-networks-icons.php";?>
</body>
</html>