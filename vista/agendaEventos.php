<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Capacitación, Certificación y Profesionalización</title>
    <link rel="stylesheet" href="../recursos/css/fullcalendar.min.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap-clockpicker.css">

    <link rel="stylesheet" href="../recursos/css/cdn.jsdelivr.net_npm_bootstrap@4.0.0_dist_css_bootstrap.min.css">
    <link href="../recursos/css/style.css" rel="stylesheet">
    <style>
      body {
        overflow-x: hidden;
      }
    </style>
  </head>
<body>
<div class="text-center">
  <div class="navbar navbar-expand-xl navbar-sicacep bg-sicacep">
    <a class="navbar-brand" href="../index.php">
      <img src="../recursos/img/sicacep-logo.png" alt="Bootstrap" width="112" height="28">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./plantilla_de_activos.php">Plantilla de activos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./homologada.php">Homologada</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./agendaEventos.php">Agenda de eventos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../controlador/CtrlSalir.php"><svg class="bi" width="14" height="14"><use xlink:href="#shutdown"/></svg> Cerrar Sesión</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="container py-4">
    <div id='CalendarioWeb'></div>
</div>
<footer>
    <div class="row g-0 justify-content-center">
        <div class="row row-cols-3 align-items-center">
            <div class="col">
                <div class="text-center">
                    <p>SICACEP &COPY; 2023</p>
                </div>
            </div>
            <div class="col-xl">
                <div class="text-center">
                    <p>Redes Sociales</p>
                    <a class="p-4" href="https://es-la.facebook.com/InamiMX"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a>
                    <a class="p-4" href="https://twitter.com/INAMI_mx"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a>
                    <a class="p-4" href="https://www.youtube.com/c/inamimx"><svg class="bi" width="24" height="24"><use xlink:href="#youtube"/></svg></a>
                </div>
            </div>

            <div class="col-xl d-none d-xl-block">
                <div class="text-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.421675248651!2d-99.20961332397208!3d19.437378190526612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d2021b1a043e67%3A0xe3e44484874694f7!2sInstituto%20Nacional%20de%20Migraci%C3%B3n%20-%20INM%20-%20Oficina%20de%20Representaci%C3%B3n!5e0!3m2!1ses-419!2smx!4v1685413387853!5m2!1ses-419!2smx" width="200" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="text-center">
                    <p><a href="https://goo.gl/maps/BJb2LxfhNqSKUekV9">Dirección: Av. Ejército Nacional No. 862, Col. Polanco, Alcaldía Miguel Hidalgo,  C. P. 11540, Ciudad de México, Tel. (55) 5387-2400</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php include "social-networks-icons.php";?>

<script src="../recursos/js/jquery.min.js"></script>
<script src="../recursos/js/moment.min.js"></script>
<script src="../recursos/js/fullcalendar.min.js"></script>
<script src="../recursos/js/es.js"></script>
<script src="../recursos/js/bootstrap-clockpicker.js"></script>

<script src="../recursos/js/cdn.jsdelivr.net_npm_popper.js@1.12.9_dist_umd_popper.min.js"></script>
<script src="../recursos/js/cdn.jsdelivr.net_npm_bootstrap@4.0.0_dist_js_bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('#CalendarioWeb').fullCalendar({
            header:{
              left:'prev,today,next',
              center:'title',
              right:'month,basicWeek,basicDay'
            },
            dayClick:function(date,jsEvent,view){

              $('#btnAgregar').prop("hidden",false);              
              $('#btnModificar').prop("hidden",true);
              $('#btnBorrar').prop("hidden",true);

              limpiarFormulario();  
              $('#txtFecha').val(date.format());
              $("#ModalEventos").modal();
            },            
            events:'http://localhost/sicacep-tecnm-inm/vista/eventos.php',
            
            eventClick:function(calEvent,jsEvent,view){

              $('#btnAgregar').prop("hidden",true);              
              $('#btnModificar').prop("hidden",false);
              $('#btnBorrar').prop("hidden",false);

              $('#tituloEvento').html(calEvent.title);

              $('#txtDescripcion').val(calEvent.descripcion);
              $('#txtID').val(calEvent.id);
              $('#txtTitulo').val(calEvent.title);
              $('#txtColor').val(calEvent.color);
              
              FechaHora= calEvent.start._i.split(" ");
              $('#txtFecha').val(FechaHora[0]);
              $('#txtHora').val(FechaHora[1]);

              $("#ModalEventos").modal();
            },
            editable:true,
            eventDrop:function(calEvent){
              $('#txtID').val(calEvent.id);
              $('#txtTitulo').val(calEvent.title);
              $('#txtColor').val(calEvent.color);
              $('#txtDescripcion').val(calEvent.descripcion);

              var fechaHora= calEvent.start.format().split("T");
              $('#txtFecha').val(fechaHora[0]);
              $('#txtHora').val(fechaHora[1]);
              
              RecolectarDatosGUI();
              EnviarInformacion('modificar',NuevoEvento,true);
            }            
        });
    });
</script>

<!-- Modal(AGREGAR, MODIFICAR, ELIMINAR) -->
<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <input type="hidden" id="txtID" name="txtID">
        <input type="hidden" id="txtFecha" name="txtFecha" />

        <div class="form-row">
          <div class="form-group col-8">
            <label>Titulo:</label>
            <input type="text" id="txtTitulo" class="form-control" placeholder="Titulo del evento">
          </div>
          <div class="form-group col-4">
            <label>Hora:</label>
            <div class="input-group clockpicker" data-autoclose="true">
              <input type="text" id="txtHora" value="00:00" class="form-control"/>
            </div>
          </div>  
        </div>
        <div class="form-group">
          <label>Descripcion:</label>
          <textarea id="txtDescripcion" rows="3" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label>Color:</label>
          <input type="color" name="#ff0000" id="txtColor">
        </div>          

      </div>
      <div class="modal-footer">

        <button type="button" id="btnAgregar" class="btn btn-primary">Agregar</button>
        <button type="button" id="btnModificar" class="btn btn-primary">Modificar</button>
        <button type="button" id="btnBorrar" class="btn btn-danger">Borrar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

      </div>
    </div>
  </div>
</div>
<script>
var NuevoEvento;
  $('#btnAgregar').click(function(){
    RecolectarDatosGUI();
    EnviarInformacion('agregar',NuevoEvento);
  });
  $('#btnBorrar').click(function(){
    RecolectarDatosGUI();
    EnviarInformacion('eliminar',NuevoEvento);
  });
  $('#btnModificar').click(function(){
    RecolectarDatosGUI();
    EnviarInformacion('modificar',NuevoEvento);
  });
function RecolectarDatosGUI(){
  NuevoEvento= {
    id:$('#txtID').val(),
    title:$('#txtTitulo').val(),
    start:$('#txtFecha').val()+" "+$('#txtHora').val(),
    color:$('#txtColor').val(),
    descripcion:$('#txtDescripcion').val(),
    textColor:"#FFFFFF",
    end:$('#txtFecha').val()+" "+$('#txtHora').val()
  };
}
function EnviarInformacion(accion,objEvento,modal){
  $.ajax({
    type:'POST',
    url:'eventos.php?accion='+accion,
    data:objEvento,
    success:function(msg){
      if(msg){
        $('#CalendarioWeb').fullCalendar('refetchEvents');
        if(!modal){
          $("#ModalEventos").modal('toggle');
        }
      }      
    },
    error:function(){
      alert("hay un error ..");
    }
  });
}

$('.clockpicker').clockpicker();
function limpiarFormulario(){
  $('#txtID').val('');
  $('#txtTitulo').val('');
  $('#txtColor').val('');
  $('#txtDescripcion').val('');
  $('#txtHora').val('00:00');
}
</script>
</body>
</html>