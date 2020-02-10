<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<!-- 	<title>Prueba de las vistas </title> -->
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


<body>



  <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Lista de pacientes</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                     <table id="tabla" class="table" >
        

      

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
                  <td>{{ $paciente->apellido }} {{ $paciente->nombre }}</td>
                  <td>{{ $paciente->edad }} </td>
                  <td>{{ $paciente->genero }}</td>
                  <td>{{ date("d/m/Y", strtotime($paciente->fecha_entrada)) }}</td>
                  <td>{{ $paciente->obra_social }}</td>


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

<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"/
></script>
<script src="https://cdn.datatables.net/1.10.20/jsjquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> -->

<script>
 $(document).ready( function () {
    $('#tabla').DataTable();
} );
</script>

</body>
</html>