<!-- Modal elimina registro -->
<div class="modal fade" id="vaciaModal" tabindex="-1" aria-labelledby="vaciaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="vaciaModalLabel">Aviso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Desea eliminar todos los registro?
            </div>

            <div class="modal-footer">
                <form action="vacia_homologada.php" method="post">

                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger" name="emptySubmit" value="EMPTY">Eliminar</button>
                </form>
            </div>

        </div>
    </div>
</div>