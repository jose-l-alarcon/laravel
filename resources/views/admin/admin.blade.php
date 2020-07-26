
@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

 <div class="content">
                

 <div class="container-fluid">

  <div class="row">
         <div class="col-md-12">
      <a href="{{ url('/nuevoUsuario') }}" class="btn btn-round btn-fill btn-success"> 
        <i class="material-icons">person_add</i>
       Agregar  paciente
      </a>

          </div>
   </div>


          
    <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Lista de pacientes</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                     <table id="tabla" class="table">
            @if ($pacientes->count())
             <thead>
                <tr>
  
                  <th>Apellido</th>
                  <th>Nombre</th>
                  <th>Edad</th>
                  <th>DNI</th>
                  <th>Obra social</th>
                  <th><center>Opciones</center></th>

                </tr>
              </thead>

               @foreach ($pacientes as $resultado)
                   
                      <tr>
                        <td>{{ $resultado->apellido }}</td>
                        <td>{{ $resultado->nombre }}</td>
                        <td>{{ $resultado->edad }}</td>
                        <td>{{ $resultado->dni }}</td>
                        <td>{{ $resultado->obra_social }}</td>
                         <td align="right"> 
                            <a href="{{route('detalle',[$resultado->idpaciente])}}"  type="button" rel="tooltip" title="Más datos del paciente" class="btn btn-warning btn-sm">
                              Ver datos
                            <a href="{{route('editar',[$resultado->idpaciente])}}" type="button" rel="tooltip" title="Editar registro" class="btn btn-info btn-sm"> Editar
                            </a>
                          </td> 
                      </tr> 
                        @endforeach
                           @else
                            <p>No hay registros de pacientes.</p>
                       @endif    
        
            </table>


              <script>
                    $(document).ready(function() {
                    $('#tabla').DataTable(

                    {
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


  

<!-- modal para ingresar pacientes -->

        </div>

      </div>

      @include('layouts/footer')

    