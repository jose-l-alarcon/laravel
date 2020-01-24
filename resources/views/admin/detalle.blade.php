@include('layouts/header')
@include('layouts/sidebar')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
  <div id="breadcrumb"> <a title="Detalle paciente" class="tip-bottom"><i class="icon-home"></i>Detalles del paciente</a> </div>
  </div>

<!-- ------------------------------------------------------------ -->
<!-- DETALLES DE ALUMNOS: VISUALIZAR LOS DATOS DEL ALUMNO --> 
<!-- ----------------------------------------------------------------- -->

      <div class="container-fluid">


    <div class="row-fluid">
      <div class="span6">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
            <h5>Paciente : {{$paciente->apellido}} {{$paciente->nombre}}</h5>
          </div>
          <div class="widget-content">
            <div class="todo">
              <ul>
                <li class="clearfix">
                  <div class="txt"> DNI: <span class="date badge badge-warning">{{$paciente->dni}}</span></div>
                  <div class="txt"> Género: <span class="date badge badge-warning">{{$paciente->genero}}</span></div>
                </li>
                <li class="clearfix">
                  <div class="txt">Fecha Nacimiento<span class="by label">{{ date("d/m/Y", strtotime($paciente->fecha_nacimiento))}}</span></div>
                  <div class="txt"> Edad: <span class="by label">{{$paciente->edad}}</span></div>
                </li>
                <li class="clearfix">
                  <div class="txt"> Obra Social <span class="date badge badge-info">{{$paciente->obra_social}}</span> </div>
                  
                </li>
                <li class="clearfix">
                  <div class="txt"> Localidad <span class="date badge badge-important">{{$paciente->localidad}}</span> </div>
                  <div class="txt"> Provincia <span class="date badge badge-important">{{$paciente->provincia}}</span> </div>
                 
                </li>
              </ul>
            </div>
          </div>
        </div>

    </div>
  </div>

  <div class="new-update clearfix"> <i class="icon-arrow-left"></i> <span class="update-notice"> <a title="Volver al listado" href="{{route ('admin')}}"><strong>Regresar al listado</strong></a> </span> </div>
</div>



      

  </div>
</div>

<!--end-main-container-part-->

@include('layouts/footer')
