@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

<div class="content">
        <div class="container-fluid">
  

        	<div class="col-md-10 ml-auto mr-auto">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Modificar diagnóstico</h4>
                  <p class="card-category">Paciente: {{$paciente->apellido}} {{$paciente->nombre}} / DNI:{{$paciente->dni}} / Fecha de ingreso: {{ date("d/m/Y", strtotime($datos->fecha_entrada)) }} </p>
                </div>
                <div class="card-body table-responsive">

                <form method="POST" action="{{url("updateDetallediagnostico/{$detalle_diagnostico->iddetalle_diagnostico}")}}">
                 {{method_field('PUT')}} 
                    <!-- utilizado para mandar oculto el metodo PUT(actualizar datos), todos los formularios utilizan method="post"   -->
                    {!!csrf_field()!!}   
                    <!-- token agregado para evitar ataques post de otros sitios , ejemplo que por el formulario se quiera ingresar un nuevo usuario -->
                                  
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" class="form-control" name="detalle_diagnostico" value="{{old('detalle_diagnostico', $detalle_diagnostico->detalle_diagnostico)}}"/>
                        </div>
                          @if ($errors->has('detalle_diagnostico'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('detalle_diagnostico')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Actualizar diagnóstico</button>
                    <div class="clearfix"></div>
                  </form>
            
                </div>
              </div>
            </div>


           <div class="stats">
                    <i class="material-icons text-success">arrow_back</i>
                    <a  href="{{route ('actualizarDiagnostico',[$detalle_diagnostico->iddiagnostico])}}"> Regresar al formulario</a>
            </div>


  </div>
</div>

@include('layouts/footer')