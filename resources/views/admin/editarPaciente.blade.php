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
          <ul>
           @foreach ($errors->all() as $error)
             <li> {{$error}}</li>
           @endforeach
        </ul>
        </div>
        @endif
      </div>
    </div>


      <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Actualizar datos del paciente</h4>
                  <p class="card-category"> {{$paciente->apellido}} {{$paciente->nombre}} </p>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{url("updatePaciente/{$paciente->idpaciente}")}}">
                 {{method_field('PUT')}} 
                    <!-- utilizado para mandar oculto el metodo PUT(actualizar datos), todos los formularios utilizan method="post"   -->
                    {!!csrf_field()!!}   
                    <!-- token agregado para evitar ataques post de otros sitios , ejemplo que por el formulario se quiera ingresar un nuevo usuario -->
        
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">DNI:</label>
                          <input type="number" name="dni" class="form-control" value="{{old('dni', $paciente->dni)}}"/>
                          <!-- old('dni', $paciente->dni) con el segundo parametro se cargara el dato actual del paciente -->
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Apellido:</label>
                          <input  type="text" name="apellido" class="form-control"  value="{{old('apellido', $paciente->apellido)}}" />
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre:</label>
                          <input type="text" name="nombre" class="form-control"  value="{{old('nombre', $paciente->nombre)}}" />
                          
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Género:</label>

                          <br>
                          <label>
                            <input type="radio" name="genero" value="Masculino" 
                            {{ $paciente->genero == 'Masculino' ? 'checked' : '' }}>
                            Masculino</label>
                          <label>
                            <label>
                            <input type="radio" name="genero" value="Femenino" 
                           {{ $paciente->genero == 'Femenino' ? 'checked' : '' }}>
                            Femenino</label>
            
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fecha nacimiento:</label>
                          <input type="date" name="fecha_nacimiento" class="form-control"  value="{{old('fecha_nacimiento', $paciente->fecha_nacimiento)}}"/>
                        </div>
                      </div>

                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Edad:</label>
                          <input type="text" name="edad" class="form-control" value="{{old('edad', $paciente->edad)}}" />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Obra social:</label>
                          <input type="text" name="obra_social" class="form-control" value="{{old('obra_social', $paciente->obra_social)}}"/>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Localidad:</label>
                          <input type="text" name="localidad" class="form-control" value="{{old('localidad', $paciente->localidad)}}"  />
                            
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Provincia:</label>
                          <input type="text" name="provincia" class="form-control" value="{{old('provincia', $paciente->provincia)}}" />
                           
                        </div>
                      </div>
                    </div>
                     <!--  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fecha de ingreso:</label>
                          <input type="date" name="fecha_entrada" class="form-control" value="{{old('fecha_entrada', $paciente->fecha_entrada)}}" />
                        </div>
                      </div>
                    </div> -->
                
                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        


        </div>
      

         <div class="stats">
                    <i class="material-icons text-success">arrow_back</i>
                    <a  href="{{route ('Admin')}}"> Regresar al listado</a>
         </div>
     

      </div>

      @include('layouts/footer')

    