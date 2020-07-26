@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

     <div class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-9 col-xs-9">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Pacientes con alta médica</h4>
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
                        <td>Fecha Egreso</td>
                        <td align="center">Descargar</td>
                      </thead>
                    @foreach ($diagnostico as $res)
                
                       <tr class="gradeX">
                       <td> {{ $res->apellido }} {{ $res->nombre }}</td>
                       <td> {{ $res->nrohistoria_clinica }} </td>
                       <td>{{ date("d/m/Y", strtotime($res->fecha_entrada))}}</td>
                       <td>{{ date("d/m/Y", strtotime($res->dia_egreso))}}</td>
                      
                           <td class="td-actions text-center"> 
                              <a  href="{{route('pdf',$res->iddiagnostico)}}" type="button" rel="tooltip" title="PDF" class="btn btn-danger btn-sm">
                              PDF
                              </a>
                            </td>
                      </tr>
                             
                              @endforeach
                           @else
                            <p>Sin altas.</p>
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
        
         <div class="stats">
                    <i class="material-icons text-success">arrow_back</i>
                    <a  href="{{route ('diagnosticos')}}"> Regresar a listado</a>
            </div>
          


        </div>
      </div>

      @include('layouts/footer')

    