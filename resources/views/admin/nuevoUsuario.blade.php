@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

      <div class="content">
                

        <div class="container-fluid">

   <div class="row">
    <div class="col-md-9">
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
      </div>
    </div>


      <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Nuevo paciente</h4>
                  <p class="card-category">Agregar los siguientes datos:</p>
                </div>
                <div class="card-body">
                  <form action="{{url('agregarUsuario')}}" method="post">
                  {!!csrf_field()!!}   
            <!-- token agregado para evitar ataques post de otros sitios , ejemplo que por el formulario se quiera ingresar un nuevo usuario -->
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">DNI:</label>
                          <input type="number" name="dni" class="form-control" value="{{old('dni')}}" />
                            @if ($errors->has('dni'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('dni')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif

                        <!-- value="{{old('dni')}}" nos permite mantener el valor del campo al enviar el formulario -->

                        <!-- preguntar si existe algun error en la variable error->dni, si es verdadero se imprime el primer error   -->
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Apellido:</label>
                          <input  type="text" name="apellido" class="form-control" value="{{old('apellido')}}" />
                           @if ($errors->has('apellido'))
                               <p style="color:#FF0000";>{{$errors->first('apellido')  }}</p>
                            @endif
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre:</label>
                          <input type="text" name="nombre" class="form-control"  value="{{old('nombre')}}" />
                           @if ($errors->has('nombre'))
                             <p style="color:#FF0000";>{{$errors->first('nombre')  }}</p>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Género:</label>

                          <br>
                          <label>
                            <input type="radio" name="genero" value="Masculino" {{ old('genero') == 'Masculino' ? 'checked' : '' }}>
                            Masculino</label>
                          <label>
                            <label>
                            <input type="radio" name="genero" value="Femenino" {{ old('genero') == 'Femenino' ? 'checked' : '' }}>
                            Femenino</label>
            
                        </div>
                         @if ($errors->has('genero'))
                               <p style="color:#FF0000";>{{$errors->first('genero')  }}</p>
                            @endif
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fecha nacimiento:</label>
                          <input type="date" name="fecha_nacimiento" class="form-control"  value="{{old('fecha_nacimiento')}}"/>
                          @if ($errors->has('fecha_nacimiento'))
                             <p style="color:#FF0000";>{{$errors->first('fecha_nacimiento')  }}</p>
                          @endif
                        </div>
                      </div>

                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Edad:</label>
                          <input type="number" name="edad" class="form-control" value="{{old('edad')}}" />
                            @if ($errors->has('edad'))
                             <p style="color:#FF0000";>{{$errors->first('edad')  }}</p>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Obra social:</label>
                          <input type="text" name="obra_social" class="form-control" value="{{old('obra_social')}}"  />
                           @if ($errors->has('obra_social'))
                           <p style="color:#FF0000";>{{$errors->first('obra_social')  }}</p>
                        @endif
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Localidad:</label>
                          <input type="text" name="localidad" class="form-control" value="{{old('localidad')}}"  />
                            @if ($errors->has('localidad'))
                             <p style="color:#FF0000";>{{$errors->first('localidad')  }}</p>
                          @endif
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Provincia:</label>
                          <input type="text" name="provincia" class="form-control" value="{{old('provincia')}}" />
                           @if ($errors->has('provincia'))
                             <p style="color:#FF0000";>{{$errors->first('provincia')  }}</p>
                          @endif
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fecha de ingreso:</label>
                          <input type="date" name="fecha_entrada" class="form-control" value="{{old('fecha_entrada')}}" />
                           @if ($errors->has('fecha_entrada'))
                             <p style="color:#FF0000";>{{$errors->first('fecha_entrada')  }}</p>
                          @endif
                        </div>
                      </div>
                    </div>
                
                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        


        </div>
      

         <div class="stats">
                    <i class="material-icons text-success">arrow_back</i>
                    <a  href="{{route ('admin')}}"> Regresar al listado</a>
         </div>
     

      </div>

      @include('layouts/footer')

    