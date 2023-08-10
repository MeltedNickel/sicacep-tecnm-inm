<!-- Modal -->
<div class="modal fade" id="importaModal" tabindex="-1" aria-labelledby="importaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="importaModalLabel">Importar registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="importa_homologada.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col">

              
                <div class="mb-3">
                  <input type="file" name="file" />
                </div>
              
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-auto">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>