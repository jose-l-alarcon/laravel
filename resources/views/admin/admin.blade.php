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


       <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Lista de Pacientes</h5>
             <span class="label label-info">Agregar paciente</span> 
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" style="width:100%">
        

      

            @if ($pacientes->count())
             <thead>
                <tr>
                  <th>Paciente</th>
                  <th>Edad</th>
                  <th>Género</th>
                  <th>Fecha de Ingreso</th>
                  <th>Opciones</th>

                </tr>
              </thead>
             @foreach ($pacientes as $paciente)
             
              <tbody>
                <tr class="gradeX">
                  <td>{{ $paciente->apellido }} {{ $paciente->nombre }}</td>
                  <td>{{ $paciente->edad }} </td>
                  <td>{{ $paciente->genero }}</td>
                  <td>{{ date("d/m/Y", strtotime($paciente->fecha_entrada)) }}</td>
                   <td class="center">5.5</td>
                </tr>
                  @endforeach
                 @else
                  <p>No hay pacientes registrados.</p>
             @endif
            
              </tbody>
            </table>
          </div>
        </div>



    
    </div>   
  </div>
</div>



<!--end-main-container-part-->

@include('layouts/footer')
