@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

<div class="content">
        <div class="container-fluid">
  

        	<div class="col-md-10 ml-auto mr-auto">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Modificar Medicación</h4>
                  <p class="card-category">Paciente: {{$paciente->apellido}} {{$paciente->nombre}} / DNI:{{$paciente->dni}} / Fecha de ingreso: {{ date("d/m/Y", strtotime($datos->fecha_entrada)) }} </p>
                </div>
                <div class="card-body table-responsive">

                <form method="POST" action="{{url("updateMedicacion/{$medicacion->idmedicacion}")}}">
                 {{method_field('PUT')}} 
                    <!-- utilizado para mandar oculto el metodo PUT(actualizar datos), todos los formularios utilizan method="post"   -->
                    {!!csrf_field()!!}   
                    <!-- token agregado para evitar ataques post de otros sitios , ejemplo que por el formulario se quiera ingresar un nuevo usuario -->
                    
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Medicación</label>
                           <input type="text" class="form-control" name="medicacion" value="{{old('medicacion', $medicacion->medicacion)}}"/>
                           @if ($errors->has('medicacion'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('medicacion')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Dosis</label>
                          <input type="text" class="form-control" name="dosis" value="{{old('dosis', $medicacion->dosis)}}"/>
                           @if ($errors->has('dosis'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('dosis')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                     
                    </div>   

                   <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fecha Inicio</label>
                           <input type="date" class="form-control" name="dia_inicio" value="{{old('dia_inicio', $medicacion->dia_inicio)}}"/>
                           @if ($errors->has('dia_inicio'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('dia_inicio')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fin medicación</label>
                           <input type="date" class="form-control" name="fecha_fin" value="{{old('fecha_fin', $medicacion->fecha_fin)}}"/>
                           @if ($errors->has('fecha_fin'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('fecha_fin')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Dias</label>
                          <input type="number" class="form-control" name="dias" value="{{old('dias', $medicacion->dias)}}"/>
                           @if ($errors->has('dias'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('dias')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                     
                    </div>        
                    <button type="submit" class="btn btn-primary pull-right">Actualizar medicación</button>
                    <div class="clearfix"></div>
                  </form>
            
                </div>
              </div>
            </div>


           <div class="stats">
                    <i class="material-icons text-success">arrow_back</i>
                    <a  href="{{route ('actualizarDiagnostico',[$medicacion->iddiagnostico])}}"> Regresar al formulario</a>
            </div>


  </div>
</div>

@include('layouts/footer')