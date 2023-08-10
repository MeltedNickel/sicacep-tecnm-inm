<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="nuevoModalLabel">Agregar registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="guarda.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label for="estatus">Status</label> 
                <select id="estatus" name="estatus" type="text" class="form-select" required>
                  <option value="">Seleccionar...</option>
                  <?php while ($row_estatus = $estatus->fetch_assoc()) { ?>
                    <option value="<?php echo $row_estatus["id"]; ?>"><?= $row_estatus["estado"] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="adscripcion_fisica">Adscripción física</label> 
                <input id="adscripcion_fisica" name="adscripcion_fisica" type="text" class="form-control">
              </div>
              <div class="mb-3">
                <label for="puesto_especifico">Puesto especifico</label> 
                <input id="puesto_especifico" name="puesto_especifico" type="text" class="form-control">
              </div>
              <div class="mb-3">
                <label for="puesto_generico">Puesto genérico</label> 
                <input id="puesto_generico" name="puesto_generico" type="text" class="form-control">
              </div>
              <div class="mb-3">
                <label for="codigo_plaza_actual">Código plaza actual</label> 
                <input id="codigo_plaza_actual" name="codigo_plaza_actual" type="text" class="form-control">
              </div>
              <div class="mb-3">
                <label for="nivel_actual">Nivel actual</label> 
                <input id="nivel_actual" name="nivel_actual" type="text" class="form-control">
              </div>
              <div class="mb-3">
                <label for="num_empleado">N°empleado</label> 
                <input id="num_empleado" name="num_empleado" type="text" class="form-control">
              </div>
            </div>
            <div class="col">
              <div class="mb-3">
                <label for="nombre">Nombre</label> 
                <input id="nombre" name="nombre" type="text" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="rfc">RFC</label> 
                <input id="rfc" name="rfc" type="text" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="curp">CURP</label> 
                <input id="curp" name="curp" type="text" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="fecha_ingreso_inami">Fecha de ingreso INAMI</label> 
                <input id="fecha_ingreso_inami" name="fecha_ingreso_inami" type="text" class="form-control">
              </div>
              <div class="mb-3">
                <label for="fecha_ingreso_plaza">Fecha ingreso a La Plaza</label> 
                <input id="fecha_ingreso_plaza" name="fecha_ingreso_plaza" type="text" class="form-control">
              </div>
              <div class="mb-3">
                <label for="tipo_de_plaza">Tipo de plaza</label> 
                <input id="tipo_de_plaza" name="tipo_de_plaza" type="text" class="form-control">
              </div>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-auto">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>