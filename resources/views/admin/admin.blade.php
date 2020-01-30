@include('layouts/header')
@include('layouts/sidebar')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
     <div id="breadcrumb"> <a title="Inicio" class="tip-bottom"><i class="icon-home"></i>Inicio</a> </div>
  </div>

<!-- ------------------------------------------------- -->
<!-- FORMULARIO PARA AGREGAR NUEVOS ALUMNOS -->
<!-- -------------------------------------------------- -->
      
<div class="container-fluid">
<div class="row-fluid">

<a href="{{route ('nuevoUsuario')}}" class="btn btn-success">Nuevo paciente</a>           

 <!--   <div class="span12 btn-icon-pg">
                  <ul>
       <li><i class="icon-user"></i> Agregar paciente</li>

     </ul>
   </div> -->

       <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Lista de Pacientes</h5>
           <!--   <span class="label label-info">Agregar paciente</span>  -->
          </div>
     
            <table id="paciente"  class="table table-bordered table-striped" >
        

      

            @if ($pacientes->count())
             <thead>
                <tr>
                  <th>Paciente</th>
                  <th>Edad</th>
                  <th>Género</th>
                  <th>Fecha Ingreso</th>
                  <th>Opción</th>

                </tr>
              </thead>
             @foreach ($pacientes as $paciente)
             
              <tbody>
                <tr class="gradeX">
                  <td><i class="icon-user"></i> {{ $paciente->apellido }} {{ $paciente->nombre }}</td>
                  <td>{{ $paciente->edad }} </td>
                  <td>{{ $paciente->genero }}</td>
                  <td>{{ date("d/m/Y", strtotime($paciente->fecha_entrada)) }}</td>
                  <td class="taskOptions"><a href="{{route('detalle',['idpaciente' => $paciente->idpaciente])}}" class="tip-top" data-original-title="Ver más datos"><i class="icon-folder-open"></i></a> <a href="{{route('editar',['idpaciente' => $paciente->idpaciente])}}" class="tip-top" data-original-title="Editar datos"><i class="icon-edit"></i></a>
                  <a href="#" class="tip-top" data-original-title="Agregar diagnostico"><i class="icon-plus"></i></a></td>
                </tr>
                  @endforeach
                 @else
                  <p>No hay pacientes registrados.</p>
             @endif
            
              </tbody>
            </table>

          <!--  -->




        </div>



    
    </div>   
  </div>
</div>



<!--end-main-container-part-->

@include('layouts/footer')
