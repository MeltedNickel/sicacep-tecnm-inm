<?php require_once("vista/navbar.php");?>
<div class="container-fluid py-4 text-center">
    <div class="row g-4">
        <div class="col-auto">
            <label for="num_registros" class="col-form-label">Mostrar</label>
        </div>
        <div class="col-auto">
            <select name="num_registros" id="num_registros" class="form-select">
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="250">250</option>
                <option value="500">500</option>
            </select>
        </div>
        <div class="col-auto">
            <label for="num_registros" class="col-form-label">registros </label>
        </div>

        <div class="col-auto">
            <label for="campo" class="col-form-label">Buscar: </label>
        </div>

        <div class="col-auto">
            <input type="text" name="campo" id="campo" class="form-control">
        </div>
    </div>
    <div class="row py-4">
        <div class="col">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <th class="sort asc">Estatus</th>
                    <th class="sort asc">Adscripción física</th>
                    <th class="sort asc">Puesto especifico</th>
                    <th class="sort asc">Puesto genérico</th>
                    <th class="sort asc">Código plaza actual</th>
                    <th class="sort asc">Nivel actual</th>
                    <th class="sort asc">N° empleado</th>
                    <th class="sort asc">Nombre</th>
                    <th class="sort asc">RFC</th>
                    <th class="sort asc">CURP</th>
                    <th class="sort asc">Fecha de ingreso INAMI</th>
                    <th class="sort asc">Fecha ingreso a La Plaza</th>
                    <th class="sort asc">Tipo de plaza</th>
                </thead>
                <tbody id="content"></tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-6">
                <label id="lbl-total"></label>
            </div>

            <div class="col-6" id="nav-paginacion"></div>

            <input type="hidden" id="pagina" value="1">
            <input type="hidden" id="orderCol" value="0">
            <input type="hidden" id="orderType" value="asc">
        </div>
    </div>
</div>
<script>
    /* Llamando a la función getData() */
    getData()

    /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
    document.getElementById("campo").addEventListener("keyup", function() {
        getData()
    }, false)
    document.getElementById("num_registros").addEventListener("change", function() {
        getData()
    }, false)


    /* Peticion AJAX */
    function getData() {
        let input = document.getElementById("campo").value
        let num_registros = document.getElementById("num_registros").value
        let content = document.getElementById("content")
        let pagina = document.getElementById("pagina").value
        let orderCol = document.getElementById("orderCol").value
        let orderType = document.getElementById("orderType").value

        if (pagina == null) {
            pagina = 1
        }

        let url = "./modelo/load.php"
        let formaData = new FormData()
        formaData.append('campo', input)
        formaData.append('registros', num_registros)
        formaData.append('pagina', pagina)
        formaData.append('orderCol', orderCol)
        formaData.append('orderType', orderType)

        fetch(url, {
                method: "POST",
                body: formaData
            }).then(response => response.json())
            .then(data => {
                content.innerHTML = data.data
                document.getElementById("lbl-total").innerHTML = 'Mostrando ' + data.totalFiltro +
                    ' de ' + data.totalRegistros + ' registros'
                document.getElementById("nav-paginacion").innerHTML = data.paginacion
            }).catch(err => console.log(err))
    }

    function nextPage(pagina){
        document.getElementById('pagina').value = pagina
        getData()
    }

    let columns = document.getElementsByClassName("sort")
    let tamanio = columns.length
    for(let i = 0; i < tamanio; i++){
        columns[i].addEventListener("click", ordenar)
    }

    function ordenar(e){
        let elemento = e.target

        document.getElementById('orderCol').value = elemento.cellIndex

        if(elemento.classList.contains("asc")){
            document.getElementById("orderType").value = "asc"
            elemento.classList.remove("asc")
            elemento.classList.add("desc")
        } else {
            document.getElementById("orderType").value = "desc"
            elemento.classList.remove("desc")
            elemento.classList.add("asc")
        }

        getData()
    }

</script>
<?php require_once("vista/footer.php");?>
<?php require_once("vista/social-networks-icons.php");?>