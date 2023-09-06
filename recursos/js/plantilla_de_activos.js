$(document).ready(function(){
    var table = $('#example').DataTable({
       orderCellsTop: true,
       fixedHeader: true,
       autoWidth: false,
       dom: 'ti<"row justify-content-center"<"col-auto"p>>',
       lengthMenu: [50, 125, 250, 500],
       pageLength: 10,

       language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "Ningún usuario encontrado",
        info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
        infoEmpty: "Ningún usuario encontrado",
        infoFiltered: "(filtrados desde _MAX_ registros totales)",
        search: "Buscar:",
        loadingRecords: "Cargando...",
        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
        }
        },
        columnDefs: [
            {orderable: false, "targets": [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]},
            { "width": "2%", "targets": [5] },
            { "width": "3%", "targets": [0, 3, 6, 12] },
            { "width": "4%", "targets": [8, 10, 11, 13] },
            { "width": "6%", "targets": [4, 9] },
            { "width": "7%", "targets": [14] },
            { "width": "9%", "targets": [1] },
            { "width": "12%", "targets": [7] }
        ]
    });

    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#example thead th').each( function (i) {
        var title = $(this).text();

        if (!(title == 'status'||title == 'acciones')) {
            $(this).html( '<label  class="text-capitalize">'+title+'</label><br><input type="text" class="rounded form-control form-control-sm" placeholder="Buscar por '+title+'" />' );
        
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                    .column(i)
                    .search( this.value )
                    .draw();
                }
            });
        }
    });
});