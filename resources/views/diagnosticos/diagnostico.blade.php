@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

      <div class="content">
                

        <div class="container-fluid">


      <!--     <a href="{{route ('nuevoUsuario')}}" class="btn btn-success">Nuevo paciente</a>    -->
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


          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Evolución diaria</h4>
                  <p class="card-category">Diagnósticos generados</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                     <table id="pacientes" class="table" >
        

      

            @if ($diagnostico->count())
             <thead>
                <tr>
                  <th>Paciente</th>
                  <th>DNI</th>
                  <th>HC Num</th>
                  <th>Edad</th>
                  <th>Género</th>
                  <th>Fecha ingreso</th>
           
                  <th>Opciones</th>

                </tr>
              </thead>
          
              @foreach ($diagnostico as $diagnostico)
           
                  
                <tr class="gradeX">
                  <td> {{ $diagnostico->apellido }} {{ $diagnostico->nombre }}</td>
                  <td> {{ $diagnostico->dni }} </td>
                  <td> {{ $diagnostico->nrohistoria_clinica }} </td>
                  <td>{{ $diagnostico->edad }} </td>
                  <td> {{ $diagnostico->genero }}</td>
                  <td>{{ date("d/m/Y", strtotime($diagnostico->fecha_entrada)) }} </td>
      
                  <td>
                    <a href="{{route('detalleDiagnostico', $diagnostico->iddiagnostico)}}" type="button" rel="tooltip" title="Detalles del ingreso" class="btn btn-outline-warning btn-sm">Detalles</a>

                   <a  href="{{route('actualizarDiagnostico',$diagnostico->iddiagnostico)}}" type="button" rel="tooltip" title="Actualizar ingreso" class="btn btn-outline-primary btn-sm">Actualizar</a>
                   

                     <a  href="{{route('pdf',$diagnostico->iddiagnostico)}}" type="button" rel="tooltip" title="Actualizar ingreso" class="btn btn-outline-info btn-sm">PDF</a>
                    </td>

                 
                </tr>
                      @endforeach
                     @else
                      <p>No hay diagnósticos generados.</p>
                 @endif
            
           
            </table>


<script>
  $(document).ready(function() {
    $('#pacientes').DataTable({
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

    