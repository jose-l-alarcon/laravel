@include('layouts/header')
@include('layouts/sidebar')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
 <div id="content-header">
    <div id="breadcrumb"> <a title="Editar paciente" class="tip-bottom"><i class="icon-home"></i>Editar datos del paciente</a> </div>
  </div>

<!-- ------------------------------------------------- -->
<!-- FORMULARIO PARA AGREGAR NUEVOS ALUMNOS -->
<!-- -------------------------------------------------- -->
      
<div class="container-fluid">
  
<div class="row-fluid">
    <div class="span8">


              <!-- devuelve verdadero si existe algun error  -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <p> Existen errores al enviar el formulario </p>
          <ul>
           @foreach ($errors->all() as $error)
             <li> {{$error}}</li>
           @endforeach
        </ul>
        </div>
        @endif
  
      <div class="widget-box">

        <div class="widget-title"> <span class="icon"> <i class="icon-hand-right"></i> </span>
          <h5 style="color:blue;">Editar datos: {{$paciente->apellido}} {{$paciente->nombre}}</h5>
        </div>

        <div class="widget-content nopadding">
          <form method="POST" action="{{url("updatePaciente/{$paciente->idpaciente}")}}" class="form-horizontal">

            {{method_field('PUT')}} 
            <!-- utilizado para mandar oculto el metodo PUT(actualizar datos), todos los formularios utilizan method="post"   -->
            {!!csrf_field()!!}   
            <!-- token agregado para evitar ataques post de otros sitios , ejemplo que por el formulario se quiera ingresar un nuevo usuario -->
        
         <div class="control-group">
              <label class="control-label">DNI:</label>
              <div class="controls">
                <input type="number" name="dni" class="span11" value="{{old('dni', $paciente->dni)}}"/>
                <!-- old('dni', $paciente->dni) con el segundo parametro se cargara el dato actual del paciente -->

              
                

              </div>
         </div>


        <div class="control-group">
              <label class="control-label">Apellido:</label>
              <div class="controls">
                <input type="text" name="apellido" class="span11" value="{{old('apellido', $paciente->apellido)}}" />


              </div>
        </div>

        <div class="control-group">
              <label class="control-label">Nombre:</label>
              <div class="controls">
                <input type="text" name="nombre" class="span11"  value="{{old('nombre', $paciente->nombre)}}" />
                
              </div>
        </div>
          
          <div class="control-group">
              <label class="control-label">Género</label>
              <div class="controls">
                <label>
                  <input type="radio" name="genero" value="Masculino" 
                          {{ $paciente->genero == 'Masculino' ? 'checked' : '' }}>
                  Masculino</label>
                <label>
                  <input type="radio" name="genero" value="Femenino" 
                          {{ $paciente->genero == 'Femenino' ? 'checked' : '' }}>
                  Femenino</label>

                 
              </div>
            </div>

            

       <div class="control-group">
              <label class="control-label">Fecha de nacimiento:</label>
              <div class="controls">
                <input type="date" name="fecha_nacimiento" class="span11" value="{{old('fecha_nacimiento', $paciente->fecha_nacimiento)}}"/>
               
              </div>
        </div>

         <div class="control-group">
              <label class="control-label">Edad:</label>
              <div class="controls">
                <input type="number" name="edad" class="span11" value="{{old('edad', $paciente->edad)}}" />
                
              </div>
         </div>

             <div class="control-group">
              <label class="control-label">Obra Social:</label>
              <div class="controls">
                <input type="text" name="obra_social" class="span11" value="{{old('obra_social', $paciente->obra_social)}}"  />
                 
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Localidad:</label>
              <div class="controls">
                <input type="text" name="localidad" class="span11" value="{{old('localidad', $paciente->localidad)}}"  />
                 
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Provincia:</label>
              <div class="controls">
                <input type="text" name="provincia" class="span11" value="{{old('provincia', $paciente->provincia)}}" />
                 
              </div>
            </div>

              <div class="control-group">
              <label class="control-label">Fecha de entrada:</label>
              <div class="controls">
                <input type="date" name="fecha_entrada" class="span11" value="{{old('fecha_entrada', $paciente->fecha_entrada)}}" />
                
              </div>
            </div>

           
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
          </form>
        </div>
      </div>

      </div>
    </div>

     <div class="new-update clearfix"> <i class="icon-arrow-left"></i> <span class="update-notice"> <a title="Volver al listado" href="{{route ('admin')}}"><strong>Regresar al listado</strong></a> </span> </div> 
  </div>
</div>

  </div>
</div>

<!--end-main-container-part-->

@include('layouts/footer')
