@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

<div class="content">
        <div class="container-fluid">
        
   <div class="row">
    <div class="col-md-10 ml-auto mr-auto">
   <!-- devuelve verdadero si existe algun error  -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <p><center>Existen errores al enviar el formulario</center> </p>
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
                 <div class="col-md-10 ml-auto mr-auto">
               <a href="{{route('altaEvolucion',[$datospaciente->iddiagnostico])}}" class="btn btn-round btn-fill btn-default">Dar de alta al paciente</a>
             <a  href="{{route('detalleDiagnostico', $datospaciente->iddiagnostico)}}" class="btn btn-round btn-fill btn-warning">
                               Vista previa 
            </a>
           </div>
           </div>

 
        <div class="row">
            <div class="col-md-10 ml-auto mr-auto">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Actualizar evolución diaria</h4>
                  <p class="card-category">Paciente: {{$datospaciente->apellido}} {{$datospaciente->nombre}} - DNI:{{$datospaciente->dni}}</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{url("updateDiagnostico/{$datospaciente->iddiagnostico}")}}">
                 {{method_field('PUT')}} 
                    <!-- utilizado para mandar oculto el metodo PUT(actualizar datos), todos los formularios utilizan method="post"   -->
                    {!!csrf_field()!!}   
                    <!-- token agregado para evitar ataques post de otros sitios , ejemplo que por el formulario se quiera ingresar un nuevo usuario -->

                    <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fecha ingreso</label>
                          <input type="date" max={{$date}} class="form-control" name="fecha_entrada" value="{{old('fecha_entrada', $datospaciente->fecha_entrada)}}" onkeydown="return false"/>
                           @if ($errors->has('fecha_entrada'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('fecha_entrada')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
            
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">N° Habitación</label>
                          <input type="number" class="form-control" name="nrohabitacion" value="{{old('nrohabitacion', $datospaciente->nrohabitacion)}}">
                              @if ($errors->has('nrohabitacion'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('nrohabitacion')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                       <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Cama</label>
                          <input type="text" class="form-control" name="nrocama" value="{{old('nrocama', $datospaciente->nrocama)}}">
                              @if ($errors->has('nrocama'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('nrocama')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                    </div>

                     <div class="row">
                     <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bipap</label>
                          <input type="text" class="form-control" name="bipap" value="{{old('bipap', $datospaciente->bipap)}}">
                              @if ($errors->has('bipap'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('bipap')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                      
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Traqueostomia</label>
                          <input type="text" class="form-control" name="traqueostomia" value="{{old('traqueostomia', $datospaciente->traqueostomia)}}">
                              @if ($errors->has('traqueostomia'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('traqueostomia')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">SNG</label>
                          <input type="text" class="form-control" name="SNG" value="{{old('SNG', $datospaciente->SNG)}}">
                              @if ($errors->has('SNG'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('SNG')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                      
                       <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sonda Vesical</label>
                          <input type="text" class="form-control" name="sonda_vesical" value="{{old('sonda_vesical', $datospaciente->sonda_vesical)}}">
                              @if ($errors->has('sonda_vesical'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('sonda_vesical')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                      
                       <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Oxígeno</label>
                          <input type="text" class="form-control" name="oxigeno" value="{{old('oxigeno', $datospaciente->oxigeno)}}">
                              @if ($errors->has('oxigeno'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('oxigeno')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                      
                    </div>
                      
                      <label>Signos Vitales:</label>
                     <div class="row">
                         
                     <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Peso</label>
                          <input type="number" step="any" class="form-control" name="signo_vital_peso" value="{{old('signo_vital_peso', $datospaciente->signo_vital_peso)}}">
                              @if ($errors->has('signo_vital_peso'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('signo_vital_peso')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                      
                       <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">TA</label>
                          <input type="text" class="form-control" name="signo_vital_ta" value="{{old('signo_vital_ta', $datospaciente->signo_vital_ta)}}">
                          @if ($errors->has('signo_vital_ta'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('signo_vital_ta')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                      
                      
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">FC</label>
                          <input type="number" step="any" class="form-control" name="signo_vital_FC" value="{{old('signo_vital_FC', $datospaciente->signo_vital_FC)}}">
                              @if ($errors->has('signo_vital_FC'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('signo_vital_FC')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">FR</label>
                          <input type="number" step="any" class="form-control" name="signo_vital_FR" value="{{old('signo_vital_FR', $datospaciente->signo_vital_FR)}}">
                              @if ($errors->has('signo_vital_FR'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('signo_vital_FR')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                       <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sat02</label>
                          <input type="number" step="any" class="form-control" name="signo_vital_Sat" value="{{old('signo_vital_Sat', $datospaciente->signo_vital_Sat)}}">
                              @if ($errors->has('signo_vital_Sat'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('signo_vital_Sat')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                       <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Temperatura</label>
                          <input type="number" step="any" class="form-control" name="signo_vital_temperatura" value="{{old('signo_vital_temperatura', $datospaciente->signo_vital_temperatura)}}">
                              @if ($errors->has('signo_vital_temperatura'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('signo_vital_temperatura')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                    </div>

                    <label>Balance:</label>
                     <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ingreso</label>
                          <input type="text"  class="form-control" name="balance_ingreso" value="{{old('balance_ingreso', $datospaciente->balance_ingreso)}}">
                              @if ($errors->has('balance_ingreso'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('balance_ingreso')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Egreso</label>
                          <input type="text"  class="form-control" name="balance_egreso" value="{{old('balance_egreso', $datospaciente->balance_egreso)}}">
                              @if ($errors->has('balance_egreso'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('balance_egreso')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Balance</label>
                          <input type="text"  class="form-control" name="balance_balance" value="{{old('balance_balance', $datospaciente->balance_balance)}}">
                              @if ($errors->has('balance_balance'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('balance_balance')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                       <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Flujo</label>
                          <input type="text" class="form-control" name="balance_flujo" value="{{old('balance_flujo', $datospaciente->balance_flujo)}}">
                              @if ($errors->has('balance_flujo'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('balance_flujo')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                      
                    </div>
                    
                <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                            <label class="bmd-label-floating">Motivo consulta</label>
                            <textarea class="form-control" rows="6" name="motivoConsulta">{{old('motivoConsulta',$datospaciente->motivoConsulta)}}</textarea>
                                @if ($errors->has('motivoConsulta'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('motivoConsulta')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                          </div>
                        </div>
                      </div>
                    </div>
               
               
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Aporte oral</label>
                          <input type="text" class="form-control" name="aporte_oral" value="{{old('aporte_oral', $datospaciente->aporte_oral)}}">
                              @if ($errors->has('aporte_oral'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('aporte_oral')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                            <label class="bmd-label-floating">Examen fisico</label>
                            <textarea class="form-control" rows="6" name="examen_fisico">{{old('examen_fisico',$datospaciente->examen_fisico)}}</textarea>
                                @if ($errors->has('examen_fisico'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('examen_fisico')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                          </div>
                        </div>
                      </div>
                    </div>

                     <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                            <label class="bmd-label-floating">Examenes complementarios</label>
                            <textarea class="form-control" rows="6" name="examen_complementario">{{old('examen_complementario',$datospaciente->examen_complementario)}}</textarea>
                                @if ($errors->has('examen_complementario'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('examen_complementario')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                            <label class="bmd-label-floating">Cultivos</label>
                            <textarea class="form-control" rows="3" name="cultivo">{{old('cultivo',$datospaciente->cultivo)}}</textarea>
                                @if ($errors->has('cultivo'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('cultivo')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                          </div>
                        </div>
                      </div>
                    </div>



                     <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                            <label class="bmd-label-floating">Comentarios</label>
                            <textarea class="form-control" rows="6" name="comentarios">{{old('comentarios',$datospaciente->comentarios)}}</textarea>
                                @if ($errors->has('comentarios'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('comentarios')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif

                          </div>
                        </div>
                      </div>
                    </div>

                    


                    <button type="submit" class="btn btn-primary pull-right">Actualizar datos</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          
          </div>

    <!-- termina el formulario -->

   <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Diagnósticos</h4>
                  <p class="card-category">Seleccionar el diagnóstico que desea editar/eliminar</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">

                    @if($detalles->count())
                      <th>ID</th>
                      <th>Diagnostico</th>
                      <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                     @foreach ($detalles as $detalles)
                      <tr>

                        <td width="50px">{{$loop->iteration}}</td>
                        <td>{{$detalles->detalle_diagnostico}}</td>
                        <td width="500px" class="td-actions text-right">
                          <a href="{{route('modificar', $detalles->iddetalle_diagnostico)}}" type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                       
                          </a>
                        </td>
                        <td width="2px">
                           <form method="POST" action="{{route('eliminarDiagnostico',$detalles->iddetalle_diagnostico )}}">
                                {{method_field('DELETE')}} 
                                
                                  {!!csrf_field()!!}   
                                
                              <button  rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>

                          </form>
                            </td>


                      </tr>
                      @endforeach
                     @else
                      <p>No hay diagnósticos generados.</p>
                    @endif
                     

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

      <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Medicación</h4>
                  <p class="card-category">Seleccionar medicación que desea editar/eliminar</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                  
                    
                    @if($detallesMedicina->count())
                       <th>ID</th>
                      <th>Medicación</th>
                      <th>Dosis</th>
                      <th>Desde</th>
                      <th>Hasta</th>
                      <th>Días</th>
                      <th></th>
                      <th></th>

                    </thead>
                    <tbody>
                     @foreach($detallesMedicina as $detallesMedicina)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td width="50px">{{$detallesMedicina->medicacion}}</td>
                        <td>{{$detallesMedicina->dosis}}</td>
                       <td>

                        @if(is_null($detallesMedicina->dia_inicio))
                        <p></p>
                        @else
                        {{ date("d/m/Y", strtotime($detallesMedicina->dia_inicio)) }}
                        @endif
                       
                       </td>
                        <td>

                        @if(is_null($detallesMedicina->fecha_fin))
                        <p></p>
                        @else
                        {{ date("d/m/Y", strtotime($detallesMedicina->fecha_fin)) }}
                        @endif
                       
                       </td>
                        <td>{{$detallesMedicina->dias}}</td>

                        <td class="td-actions text-right">
                         
                            <a href="{{route('modificarMedicacion', $detallesMedicina->idmedicacion)}}" type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                            </a>
                        </td>
                          
                        <td  width="2px">
                            <form method="POST" action="{{route('eliminarMedicacion',$detallesMedicina->idmedicacion )}}">
                                {{method_field('DELETE')}} 
                                
                                  {!!csrf_field()!!}   
                                
                              <button  rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>

                          </form>
                            </td>



                      </tr>
                      @endforeach
                     @else
                      <p>No hay medicación para el paciente.</p>
                    @endif

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
   

      <div class="row">
         <div class="col-md-10 ml-auto mr-auto">
          <p> (*) Opciones generar PFD - Agregar diagnóstico - Agregar medicación  </p>  
          <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="btn btn-round btn-fill btn-default" href="{{route ('pdf',$datospaciente->iddiagnostico)}}">
                             PDF
                         
                          </a>
                        </li>
                         <li class="nav-item">
                          <button id="ocultar1" onclick="ShowHide1()" class="btn btn-round btn-fill btn-info" title="Agregar medicación" data-toggle="tab">NUEVO DIAGNOSTICO</button>
                        </li>
                       
                        <li class="nav-item">
                          <button id="ocultar2" onclick="ShowHide2()" class="btn btn-round btn-fill btn-info" title="Agregar medicación" data-toggle="tab">NUEVA MEDICACION</button>
                        </li>
                      </ul>


            </div>
          </div>

          <div class="stats">
                    <i class="material-icons text-success">arrow_back</i>
                    <a  href="{{route ('diagnosticos')}}"> Regresar al listado</a>
            </div>

          

            <div id="ocultarDiagnostico" class="col-md-10 ml-auto mr-auto">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Agregar diagnóstico</h4>
                </div>
                <div class="card-body table-responsive">

                <form id="form" method="post" action="{{url("agregarDetalleDiagnostico/{$datospaciente->iddiagnostico}")}}">

                 {!!csrf_field()!!} 
                
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" class="form-control" id="detalle_diagnostico" name="detalle_diagnostico" class="form-control" value="{{old('detalle_diagnostico')}}"/>
                           @if ($errors->has('detalle_diagnostico'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('detalle_diagnostico')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        </div>
                         
                      </div>
                    </div>
                    <button type="submit" onclick="btn_guardar()"class="btn btn-primary pull-right"> Agregar diagnóstico</button>
                    <div class="clearfix"></div>
                  </form>
            
                </div>
              </div>
            </div>

       <div  id="ocultarMedicacion" class="col-md-10 ml-auto mr-auto">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Agregar medicación</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body table-responsive">

            <form id="form1" method="post" action="{{url("agregarNuevaMedicacion/{$datospaciente->iddiagnostico}")}}">

              {!!csrf_field()!!} 
                
                  <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Medicación</label>
                           <input type="text" class="form-control" id="medicacion" name="medicacion" class="form-control" value="{{old('medicacion')}}"/>
                              @if ($errors->has('medicacion'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('medicacion')}}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                         
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Dosis</label>
                          <input type="text" class="form-control" id="dosis" name="dosis" class="form-control" value="{{old('dosis')}}" />
                            @if ($errors->has('dosis'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('dosis')}}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                         
                        </div>
                      </div>

                       <div class="col-md-3">
                        <div class="form-group">
                          <label>Fecha Inicio</label>
                           <input type="date" class="form-control" id="dia_inicio" name="dia_inicio" class="form-control" value="{{old('dia_inicio')}}"/>
                             @if ($errors->has('dia_inicio'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('dia_inicio')}}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                      </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Fin medicación</label>
                           <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" class="form-control" value="{{old('fecha_fin')}}"/>
                             @if ($errors->has('fecha_fin'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('fecha_fin')}}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                      </div>
                    </div>

                     <div class="col-md-1">
                        <div class="form-group">
                          <label>Dias</label>
                           <input type="number" class="form-control"  name="dias" class="form-control" value="{{old('dias')}}"/>
                      </div>
                    </div>
                     
                    </div>   
             
                    <button type="submit" onclick="btn_guardar1()" class="btn btn-primary pull-right"> Agregar medicación</button>
                    <div class="clearfix"></div>
                  </form>
            
                </div>
              </div>
            </div>  

            

          <script src="{{ asset ('js/jquery-3.5.0.js')}}"></script>
           <script type="text/javascript">
       
                  $('#ocultarDiagnostico').hide();

                  function ShowHide1(){
                     txt ="";

                    text= $('#ocultar1').text();
                 
                     if(text === "NUEVO DIAGNOSTICO"){
                       $('#ocultarDiagnostico').show();
                       txt = "OCULTAR";
                     }
                     else {
                      $('#ocultarDiagnostico').hide();
                      txt = "NUEVO DIAGNOSTICO";
                     }

                     $('#ocultar1').html(txt);
                    }
           </script>

            <script type="text/javascript">

                  $('#ocultarMedicacion').hide();

                  function ShowHide2(){
                     txt1 ="";

                    text1= $('#ocultar2').text();
                 
                     if(text1 === "NUEVA MEDICACION"){
                       $('#ocultarMedicacion').show();
                       txt = "OCULTAR";
                     }
                     else {
                      $('#ocultarMedicacion').hide();
                      txt = "NUEVA MEDICACION";
                     }

                     $('#ocultar2').html(txt);
                    }
                 
           </script>

    <script type="text/javascript">

    function btn_guardar(){
      jQuery.validator.messages.required = 'Campo obligatorio';
      $('#form').validate({ // initialize the plugin

        rules: {

            detalle_diagnostico: {

                required: true

            },
        }
      });  
    }

      function btn_guardar1(){
      jQuery.validator.messages.required = 'Campo obligatorio';
      $('#form1').validate({ // initialize the plugin

        rules: {

            medicacion: {

                required: true

            },
            
        }
      });  
    }
            
                 
           </script>

   
                 
    
       
  





        </div>
      </div>

        


@include('layouts/footer')