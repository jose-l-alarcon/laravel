
@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

 <div class="content">
                

 <div class="container-fluid">


    @if(Session::has('ingreso'))
       <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
        <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <center><b>{{Session::get('ingreso')}} </b></center></span>
         </div>

        </div>
      </div>
      @endif


    @if(Session::has('actualizado'))
       <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
        <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <center><b>{{Session::get('actualizado')}} </b></center></span>
         </div>

        </div>
      </div>
      @endif
          
    <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Lista de pacientes</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                     <table id="tabla" class="table">
        
             <thead>
                <tr>
  
                  <th width="40px">Apellido</th>
                  <th width="40px">Nombre</th>
                  <th width="40px">Género</th>
                  <th width="10px">Edad</th>
                  <th width="40px">Fecha Nacimiento</th>
                  <th width="40px">Obra Social</th>
                  <th width="120px"><center>Opciones</center></th>

                </tr>
              </thead>
        
            </table>


<script>
  $(document).ready(function() {
    $('#tabla').DataTable(

          {
         
          "serverSide": true,
           "ajax": "{{ url('api/pacientes') }}",
           "columns": [
       
             {data : "apellido" }, 
             {data : "nombre" },
             {data : "genero" },
             {data : "edad" },
             {data : "fecha_nacimiento" },
             {data : "obra_social" },
             {data : "btn"},

            ],

            "columnDefs": 
            [{targets:4, render:function(data){
              return moment(data).format('DD/MM/YYYY');
              }}],

            

          "language": {
              "decimal": "",
              "emptyTable": "No hay registros de pacientes",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
              "infoEmpty": "Mostrando 0 de 0 de 0 Entradas",
              "infoFiltered": "(Filtrado de _MAX_ total entradas)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Registros",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscar:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
                    }



          });
  } );
</script>





                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

      @include('layouts/footer')

    