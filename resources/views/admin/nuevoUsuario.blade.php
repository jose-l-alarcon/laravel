@include('layouts/header')
@include('layouts/sidebar')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
     <div id="breadcrumb"> <a title="Alta paciente" class="tip-bottom"><i class="icon-home"></i>Agregar nuevo paciente</a> </div>
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
         <!--  <ul>
           @foreach ($errors->all() as $error)
             <li> {{$error}}</li>
           @endforeach
        </ul> -->
        </div>
        @endif
  
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-hand-right"></i> </span>
          <h5 style="color:blue;">Ingrese los siguientes datos del paciente:</h5>
        </div>

        <div class="widget-content nopadding">
          <form action="{{url('agregarUsuario')}}" method="post" class="form-horizontal">
            
            {!!csrf_field()!!}   
            <!-- token agregado para evitar ataques post de otros sitios , ejemplo que por el formulario se quiera ingresar un nuevo usuario -->
        
         <div class="control-group">
              <label class="control-label">DNI:</label>
              <div class="controls">
                <input type="number" name="dni" class="span11" value="{{old('dni')}}"/>
                @if ($errors->has('dni'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                   <p style="color:#FF0000";>{{$errors->first('dni')  }}</p>
                   <!-- $errors->first imprime el primer error encontrado -->
                @endif

                <!-- value="{{old('dni')}}" nos permite mantener el valor del campo al enviar el formulario -->

                <!-- preguntar si existe algun error en la variable error->dni, si es verdadero se imprime el primer error   -->
              </div>
         </div>


        <div class="control-group">
              <label class="control-label">Apellido:</label>
              <div class="controls">
                <input type="text" name="apellido" class="span11" value="{{old('apellido')}}" />


                 @if ($errors->has('apellido'))
                   <p style="color:#FF0000";>{{$errors->first('apellido')  }}</p>
                @endif
              </div>
        </div>

        <div class="control-group">
              <label class="control-label">Nombre:</label>
              <div class="controls">
                <input type="text" name="nombre" class="span11"  value="{{old('nombre')}}" />
                 @if ($errors->has('nombre'))
                   <p style="color:#FF0000";>{{$errors->first('nombre')  }}</p>
                @endif
              </div>
        </div>

         <!-- <div class="control-group">
              <label class="control-label">Género:</label>
              <div class="controls">
                <input type="text" name="genero" class="span11" value="{{old('genero')}}" placeholder="Género" />
                 @if ($errors->has('genero'))
                   <p style="color:#FF0000";>{{$errors->first('genero')  }}</p>
                @endif
              </div>
       </div> -->
          
          <div class="control-group">
              <label class="control-label">Género</label>
              <div class="controls">
                <label>
                  <input type="radio" name="genero" value="Masculino" {{ old('genero') == 'Masculino' ? 'checked' : '' }}>
                  Masculino</label>
                <label>
                  <input type="radio" name="genero" value="Femenino"/>
                  Femenino</label>

                   @if ($errors->has('genero'))
                   <p style="color:#FF0000";>{{$errors->first('genero')  }}</p>
                @endif
              </div>
            </div>

      <!--  <div class="control-group">
              <label class="control-label">Género</label>
              <div class="controls">
                <select name="genero" >
                  <option ></option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
                 @if ($errors->has('genero'))
                   <p style="color:#FF0000";>{{$errors->first('genero')  }}</p>
                @endif
              </div>
            </div> -->

            

       <div class="control-group">
              <label class="control-label">Fecha de nacimiento:</label>
              <div class="controls">
                <input type="date" name="fecha_nacimiento" class="span11" value="{{old('fecha_nacimiento')}}"/>
                 @if ($errors->has('fecha_nacimiento'))
                   <p style="color:#FF0000";>{{$errors->first('fecha_nacimiento')  }}</p>
                @endif
              </div>
        </div>

         <div class="control-group">
              <label class="control-label">Edad:</label>
              <div class="controls">
                <input type="number" name="edad" class="span11" value="{{old('edad')}}" />
                 @if ($errors->has('edad'))
                   <p style="color:#FF0000";>{{$errors->first('edad')  }}</p>
                @endif
              </div>
         </div>

             <div class="control-group">
              <label class="control-label">Obra Social:</label>
              <div class="controls">
                <input type="text" name="obra_social" class="span11" value="{{old('obra_social')}}"  />
                  @if ($errors->has('obra_social'))
                   <p style="color:#FF0000";>{{$errors->first('obra_social')  }}</p>
                @endif
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Localidad:</label>
              <div class="controls">
                <input type="text" name="localidad" class="span11" value="{{old('localidad')}}"  />
                  @if ($errors->has('localidad'))
                   <p style="color:#FF0000";>{{$errors->first('localidad')  }}</p>
                @endif
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Provincia:</label>
              <div class="controls">
                <input type="text" name="provincia" class="span11" value="{{old('provincia')}}" />
                  @if ($errors->has('provincia'))
                   <p style="color:#FF0000";>{{$errors->first('provincia')  }}</p>
                @endif
              </div>
            </div>

              <div class="control-group">
              <label class="control-label">Fecha de entrada:</label>
              <div class="controls">
                <input type="date" name="fecha_entrada" class="span11" value="{{old('fecha_entrada')}}" />
                  @if ($errors->has('fecha_entrada'))
                   <p style="color:#FF0000";>{{$errors->first('fecha_entrada')  }}</p>
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
