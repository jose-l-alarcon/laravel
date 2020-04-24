@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

     <div class="content">
        <div class="container-fluid">

           @if(Session::has('ingreso'))
       <div class="row">
        <div class="col-md-9 col-xs-9">
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
            <div class="col-md-9 col-xs-9">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Evolución diaria de pacientes</h4>
                  <p class="card-category">Ingresos generados</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="tabla" class="table">
                    <div class="col-md-6 col-xs-6">
                    </div>
                 
                    @if ($diagnostico->count())
                      <thead class=" text-primary">
                        <td>Paciente</td>
                        <td>HC Num</td>
                        <td>Fecha Ingreso</td>
                        <td align="center">Opciones</td>
                      </thead>
                    @foreach ($diagnostico as $res)
                
                       <tr class="gradeX">
                       <td> {{ $res->apellido }} {{ $res->nombre }}</td>
                       <td> {{ $res->nrohistoria_clinica }} </td>
                       <td>{{ date("d/m/Y", strtotime($res->fecha_entrada))}}</td>
                      
                           <td class="td-actions text-center"> 
                              <a  href="{{route('detalleDiagnostico', $res->iddiagnostico)}}" type="button" rel="tooltip" title="Vista previa" class="btn btn-warning btn-sm">
                               Vista previa
                              </a>
                              <a href="{{route('actualizarDiagnostico',$res->iddiagnostico)}}" type="button" rel="tooltip" title="Actualizar registro" class="btn btn-info btn-sm">
                               Actualizar
                              </a>
                              <a  href="{{route('pdf',$res->iddiagnostico)}}" type="button" rel="tooltip" title="PDF" class="btn btn-danger btn-sm">
                              PDF
                              </a>
                            </td>
                      </tr>
                             
                              @endforeach
                           @else
                            <p>No hay diagnósticos generados.</p>
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


        <!--  <div class="row">
            <div class="col-md-9 col-xs-9">
           <a href="" class="btn btn-round btn-fill btn-default">Pacientes dados de alta</a>

                </div>
          </div> -->


        </div>
      </div>

      @include('layouts/footer')

    