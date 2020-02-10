
@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

      <div class="content">
                

        <div class="container-fluid">

           <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">person</i>
                  </div>
                  <p class="card-category">Registrados</p>
                  <h5 class="card-title">{{$pacientes->count()}} pacientes
                  </h5>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-success">person_add</i>
                    <a href="{{ url('/nuevoUsuario') }}">Agregar paciente</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

      <!--     <a href="{{route ('nuevoUsuario')}}" class="btn btn-success">Nuevo paciente</a>    -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Lista de pacientes</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                     <table id="pacientes" class="table" >
        

      

            @if ($pacientes->count())
             <thead>
                <tr>
                  <th>Paciente</th>
                  <th>Edad</th>
                  <th>Género</th>
                  <th>Fecha ingreso</th>
                  <th>Obra social</th>
                  <th>Opciones</th>

                </tr>
              </thead>
          
             
              <tbody>
                   @foreach ($pacientes as $paciente)
                <tr class="gradeX">
                  <td> {{ $paciente->apellido }} {{ $paciente->nombre }}</td>
                  <td>{{ $paciente->edad }} </td>
                  <td>{{ $paciente->genero }}</td>
                  <td>{{ date("d/m/Y", strtotime($paciente->fecha_entrada)) }}</td>
                  <td>{{ $paciente->obra_social }}</td>
<!-- 
                  <td class="taskOptions"><a href="{{route('detalle',['idpaciente' => $paciente->idpaciente])}}" class="tip-top" data-original-title="Ver más datos"><i class="icon-folder-open"></i></a> <a href="{{route('editar',['idpaciente' => $paciente->idpaciente])}}" class="tip-top" data-original-title="Editar datos"><i class="icon-edit"></i></a>
                  <a href="#" class="tip-top" data-original-title="Agregar diagnostico"><i class="icon-plus"></i></a></td> -->

                   <td class="td-actions text-left">
                              <a href="{{route('detalle',['idpaciente' => $paciente->idpaciente])}}"type="button" rel="tooltip" title="Ver más datos" class="btn btn-success btn-link btn-sm">
                                <i class="material-icons">folder</i>
                              </a>

                              <a href="{{route('editar',['idpaciente' => $paciente->idpaciente])}}" type="button" rel="tooltip" title="Editar datos" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </a>

                               <a type="button" rel="tooltip" title="Diagnósticos" class="btn btn-warning btn-link btn-sm">
                                <i class="material-icons">add_to_queue</i>
                              </a>
                   </td>
                </tr>
                      @endforeach
                     @else
                      <p>No hay pacientes registrados.</p>
                 @endif
            
              </tbody>
            </table>
<script src="https://code.jquery.com/jquery-3.3.1.js"/
></script>
<!-- <script src="https://cdn.datatables.net/1.10.20/jsjquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function() {
    $('#pacientes').DataTable({
                  "language": {
        "decimal": "",
        "emptyTable": "No hay información",
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
              },} 
              );
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

    