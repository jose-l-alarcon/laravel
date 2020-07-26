@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

<div class="content">
        <div class="container-fluid">
  

         <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title ">Alta médica del paciente</h4>
                </div>
                <p> <form method="POST" action="{{url("egreso/{$datospaciente->iddiagnostico}")}}">
                             {{method_field('PUT')}} 
                                <!-- utilizado para mandar oculto el metodo PUT(actualizar datos), todos los formularios utilizan method="post"   -->
                                {!!csrf_field()!!}   
                                   <button type="submit" class="btn btn-info btn-sm">Confirmar</button>
                                    <div class="clearfix"></div>
                          </form>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                       
                        <th>
                          Paciente
                        </th>
                        <th>
                          DNI
                        </th>
                        <th>
                          HC Num
                        </th>
                        <th>
                          Día de ingreso
                        </th>
                         <th>
                        
                        </th>

                      </thead>
              
                        <tr>
                          <td>{{$datospaciente->apellido}} {{$datospaciente->nombre}}</td>
                          <td>{{$datospaciente->dni}}</td>
                          <td>{{$datospaciente->hcnum}}</td>
                          <td>{{ date("d/m/Y", strtotime($datospaciente->fecha_entrada))}}</td>

                        </tr>
                      
                       
                   

                 
                    </table>
                  </div>
                </div>
              </div>
            </div>


          <div class="stats">
                    <i class="material-icons text-success">arrow_back</i>
                    <a  href="{{route ('diagnosticos')}}"> Regresar al listado</a>
            </div>


  </div>
</div>

@include('layouts/footer')