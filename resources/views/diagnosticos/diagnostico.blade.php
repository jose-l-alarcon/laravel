@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

     <div class="content">
        <div class="container-fluid">

    <div class="row">
         <div class="col-md-12">
            <button id="ocultar1" onclick="ShowHide1()" class="btn btn-round btn-fill btn-success" title="Agregar medicación" data-toggle="tab">NUEVA EVOLUCION</button>
            <!--  <button type="button" class="btn btn-round btn-fill btn-info" data-toggle="modal" data-target="#exampleModalCenter">
               AYUDA <i class="material-icons">menu_book</i>
              </button> -->
          </div>
     </div>

       <div id="ocultarDiagnostico" class="col-md-6 col-xs-6">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Nueva evolución</h4>
                  <p class="card-category">Seleccionar el paciente para generar la evolución </p>
                </div>
                <div class="card-body table-responsive">
                  <table id="tablaPaciente" class="table table-hover">
                 @if ($pacientes->count())
                    <thead class="text-warning">
                      <th>Paciente</th>
                      <th>DNI</th>
                      <th>Opción</th>
                    </thead>
                  @foreach ($pacientes as $resultado)
                   
                      <tr>
                        <td>{{ $resultado->apellido }} {{ $resultado->nombre }}</td>
                        <td>{{ $resultado->dni }}</td>
                        <td><a href="{{route('nuevodiagnostico',[$resultado->idpaciente])}}" type="button" rel="tooltip" title="Seleccionar paciente" class="btn btn-info btn-sm">Seleccionar </a>
                        </td>
                      </tr> 
                        @endforeach
                           @else
                            <p>No hay registros de pacientes.</p>
                       @endif           
                  
                  </table>
                </div>
              </div>
            </div>
          </div>


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
                       <td> {{ $res->hcnum }} </td>
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
                            <p>No hay ingresos generados.</p>
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

                     <script>
                    $(document).ready(function() {
                    $('#tablaPaciente').DataTable(

                    {
                    "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
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



                  <script src="{{ asset ('js/jquery-3.5.0.js')}}"></script>
                   <script type="text/javascript">
               
                          $('#ocultarDiagnostico').hide();

                          function ShowHide1(){
                             txt ="";

                            text= $('#ocultar1').text();
                         
                             if(text === "NUEVA EVOLUCION"){
                               $('#ocultarDiagnostico').show();
                               txt = "OCULTAR EVOLUCION";
                             }
                             else {
                              $('#ocultarDiagnostico').hide();
                              txt = "NUEVA EVOLUCION";
                             }

                             $('#ocultar1').html(txt);
                            }
                   </script>

                  </div>
                </div>
                
              </div>
            </div>
      
          </div>

           <div class="row">
             <div class="col-md-12">
                <a href="{{route('pacientesEgreso')}}" class="btn btn-round btn-fill btn-default">Pacientes dados de alta</a>
              </div>
            </div>
<!-- modal informacion de ayuda -->
            <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Información de ayuda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p align="justify">Para agregar una evolución , debe presionar el boton <img style="width:130px; height:50px;" src=" {{ asset ('img/ayuda.png')}}"/> se desplegará una lista con los pacientes que fueron agregados al sistemas. A continuación seleccionar el paciente que desea evolucionar. </p>
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div> -->
<!-- -------------------------------------- -->

        </div>
      </div>

      @include('layouts/footer')

    