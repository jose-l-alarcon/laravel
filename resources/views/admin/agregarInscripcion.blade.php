@include('layouts/header')
@include('layouts/sidebar')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    
  </div>

<!-- ------------------------------------------------- -->
<!-- FORMULARIO PARA AGREGAR UNA NUEVA INSCRIPCION -->
<!-- -------------------------------------------------- -->

      <div class="container-fluid">
<div class="row-fluid">
    <div class="span8">


              <!-- devuelve verdadero si existe algun error  -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <p> Existen errores al enviar el formulario </p>
         <!--  <ul>
           @foreach ($errors->all() as $error)
             <li> {{$error}}</li>
           @endforeach
        </ul> -->
        </div>
        @endif
  
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Nueva inscripción</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="{{url('agregarUsuario')}}" method="post" class="form-horizontal">
            
            {!!csrf_field()!!}   
            <!-- token agregado para evitar ataques post de otros sitios -->
             <div class="control-group">
              <label class="control-label">Nombre de materia:</label>
              <div class="controls">
                <input type="text" name="dni" class="span11" value="{{old('dni')}}" placeholder="materia" />
                @if ($errors->has('dni'))
                   <p style="color:#FF0000";>{{$errors->first('dni')  }}</p>
                @endif

                <!-- preguntar si existe algun error en la variable error->dni, si es verdadero se imprime el primer error   -->
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Periodo de inscripción:</label>
              <div class="controls">
                <input type="text" name="nombre" class="span11" placeholder="periodo" value="{{old('nombre')}}" />
                 @if ($errors->has('nombre'))
                   <p style="color:#FF0000";>{{$errors->first('nombre')  }}</p>
                @endif
              </div>
            </div>

           
           
          

          

           
            
           
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Guardar</button>
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
