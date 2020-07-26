 @include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

      <div class="content">
        <div class="container-fluid">



          <div class="row">
             <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Nuevo ingreso</h4>
                  <p class="card-category">Complete los datos del formulario - Paciente :
                  {{$paciente->apellido}} {{$paciente->nombre}} - DNI: {{$paciente->dni}}</p>
                </div>

         <div class="card-body">
                  <form method="post" id="form" action="{{url("createDiagnostico/{$paciente->idpaciente}")}}">
                     {!!csrf_field()!!} 

                     
                    <div class="row">

               

                      <div class="col-md-3">
                        <div class="form-group"> 
                          <label>Fecha ingreso</label>
                          <input type="date" max={{$date}} name="fecha_entrada" class="form-control" value="{{old('fecha_entrada')}}" onkeydown="return false" />
                           @if ($errors->has('fecha_entrada'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('fecha_entrada')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        
                        </div>
                      </div>

                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>N° Habitación</label>
                          <input type="number" name="nrohabitacion" class="form-control" value="{{old('nrohabitacion')}}" />
                          @if ($errors->has('nrohabitacion'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('nrohabitacion')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                          
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Cama</label>
                          <input type="text" name="nrocama" class="form-control" value="{{old('nrocama')}}" />
                           @if ($errors->has('nrocama'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('nrocama')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        

                        </div>
                      </div>
                    </div>

                <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Bipap</label>
                          <input type="text" name="bipap" class="form-control" value="{{old('bipap')}}" />
                           @if ($errors->has('bipap'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('bipap')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif

                         
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Traqueostomia</label>
                          <input type="text" name="traqueostomia" class="form-control" value="{{old('traqueostomia')}}" />
                             @if ($errors->has('traqueostomia'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('traqueostomia')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif                       
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>SNG</label>
                          <input type="text" name="SNG" class="form-control" value="{{old('SNG')}}" />
                           @if ($errors->has('SNG'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('SNG')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                        
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Sonda Vesical</label>
                          <input type="text" name="sonda_vesical" class="form-control" value="{{old('sonda_vesical')}}" />
                          @if ($errors->has('sonda_vesical'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('sonda_vesical')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif

                     
                        </div>
                      </div>
                    </div>
                       
                    <label>Signos Vitales:</label>
                     <div class="row"> 
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Peso</label>
                          <input type="number" name="signo_vital_peso" class="form-control" value="{{old('signo_vital_peso')}}" />
                           @if ($errors->has('signo_vital_peso'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('signo_vital_peso')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                         
                        </div>
                      </div>

                       <div class="col-md-2">
                        <div class="form-group">
                          <label>TA</label>
                          <input type="text" name="signo_vital_ta" class="form-control" value="{{old('signo_vital_ta')}}" />
                           @if ($errors->has('signo_vital_ta'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('signo_vital_ta')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                         
                        </div>
                      </div>


                      <div class="col-md-2">
                        <div class="form-group">
                          <label>FC</label>
                          <input type="number" name="signo_vital_FC" class="form-control" value="{{old('signo_vital_FC')}}" />
                           @if ($errors->has('signo_vital_FC'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('signo_vital_FC')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                          
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>FR</label>
                          <input type="number" name="signo_vital_FR" class="form-control" value="{{old('signo_vital_FR')}}" />
                           @if ($errors->has('signo_vital_FR'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('signo_vital_FR')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                          
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Sat02</label>
                          <input type="number" name="signo_vital_Sat" class="form-control"value="{{old('signo_vital_Sat')}}" />
                           @if ($errors->has('signo_vital_Sat'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('signo_vital_Sat')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                         

                        </div>
                      </div>

                       <div class="col-md-2">
                        <div class="form-group">
                          <label>Temperatura</label>
                          <input type="number" name="signo_vital_temperatura" class="form-control" value="{{old('signo_vital_temperatura')}}" />
                           @if ($errors->has('signo_vital_temperatura'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('signo_vital_temperatura')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                          
                        </div>
                      </div>

                    </div>

              <!-- ----------- signos vitales   ---------------- -->

                <!-- ----------- balance   ---------------- -->

              <label>Balance:</label>
                     <div class="row"> 
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Ingreso</label>
                          <input type="text" name="balance_ingreso" class="form-control" value="{{old('balance_ingreso')}}" />
                           @if ($errors->has('balance_ingreso'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('balance_ingreso')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                         
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Egreso</label>
                          <input type="text" name="balance_egreso" class="form-control" value="{{old('balance_egreso')}}" />
                           @if ($errors->has('balance_egreso'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('balance_egreso')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                          
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Balance</label>
                          <input type="text" name="balance_balance" class="form-control" value="{{old('balance_balance')}}" />
                           @if ($errors->has('balance_balance'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('balance_balance')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                          
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Flujo</label>
                          <input type="text" name="balance_flujo" class="form-control" value="{{old('balance_flujo')}}" />
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
                          <label >Motivo de consulta</label>
                          <div class="form-group">
                          <!--   <label class="bmd-label-floating">Detalles:</label> -->
                            <textarea class="form-control" name="motivoConsulta" rows="4">{{old('motivoConsulta')}}</textarea>
                             @if ($errors->has('motivoConsulta'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                          <p style="color:#FF0000";>{{$errors->first('motivoConsulta')}}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                                
                          </div>
                        </div>
                      </div>
                    </div>

     
<!-- Diagnostico -->
                  
           <div class="row">
             <div class="col-md-12 ml-auto mr-auto">
              <div class="card">
                  <!-- campo textarea para ingresar el diagnostico -->
                     <div class="col-md-12">
                          <div class="form-group">
                            <label>Diagnósticos</label>
                            <div class="form-group">
                             <div class="row">
                              <div class="col-md-8"> 
                                <div class="col-md-10 col-md-offset-6">  
                                  <div class="form-group">
                                    <textarea class="form-control" name="detalle_diagnostico" id="detalle_diagnostico" class="ph-center" rows="2" placeholder="Ingresar aquí el diagnóstico"></textarea>
                              
                                    </div>   
                                   </div>  
                                </div>
                        <!-- boton agregar -->
                               <div class="col-md-3">
                                  <div class="form-group">
                                  <label class="text-primary"></label>
                              <button type="button" id="btn_add" class="btn btn-round btn-fill btn-info">
                                          Agregar
                                    </button>
                                  </div>
                              </div>
                           <!-- boton agregar -->
                            </div>
                          </div>    
                        </div>
                       </div>
                  
                          <!-- Tabla donde se insertan los diagnosticos -->
                  <div class="col-lg-8 col-md-12">
                      <div class="card">
                       
                        <div class="col-md-10 col-md-offset-6">  
                                     <label>Lista de diagnósticos</label>
                                   </div>
                   
                        <div class="card-body table-responsive">
                          <table id="tabladetalle" class="table table-hover">
                            <thead>
                            </thead>
                            <tbody>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                   <!-- Tabla donde se insertan los diagnosticos -->
              </div>
            </div>
          </div>

       <!-- Medicacion  -->
            <div class="row">
             <div class="col-md-12 ml-auto mr-auto">
              <div class="card">
                  <!-- campo textarea para ingresar el diagnostico -->
                     <div class="col-md-12 col-xs-12" >
                          <div class="form-group">
                            <label>Ingreso de la medicación</label>
                            <div class="form-group">
                             <div class="row">

                                
                              <div class="col-md-3"> 
                                  <div class="form-group">
                                     <label>Medicación:</label>
                                     <input type="text" name="medicacion" id="medicacion" class="form-control"/>
                                    </div>    
                                </div>

                               <div class="col-md-3"> 
                                  <div class="form-group">
                                     <label>Dosis:</label>
                                     <input type="text" name="dosis" id="dosis" class="form-control"/>
                                    </div>    
                                </div>

                                <div class="col-md-3"> 
                                  <div class="form-group">
                                     <label>Fecha inicio:</label>
                                      <input type="date" max={{$date}} name="dia_inicio" id="dia_inicio" class="form-control" onkeydown="return false"/>
                                    </div>   
                                </div>
                        <!-- boton agregar -->
                               <div class="col-md-3">
                                  <div class="form-group">
                                  <label class="text-primary"></label>
                                    <button type="button" id="btn_add2" class="btn btn-round btn-fill btn-info">
                                          Agregar
                                    </button>
                                  </div>
                              </div>
                           <!-- boton agregar -->
                           </div>
                          </div>    
                        </div>
                       </div>
                  
                

            <div class="col-lg-8 col-md-12">
              <div class="card">
               
                <div class="col-md-10 col-md-offset-6">  
                             <label>Lista de medicamentos</label>
                           </div>
           
                <div class="card-body table-responsive">
                  <table id="tablamedicacion" class="table table-hover">
                    <thead>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
       
                   <!-- Tabla para insertar la medicacion -->
              </div>
            </div>
          </div>
    <!-- Medicacion  -->
  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Aporte oral</label>
                          <input type="text" name="aporte_oral" class="form-control" value="{{old('aporte_oral')}}" />
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
                          <label >Examen fisico</label>
                          <div class="form-group">
                          <!--   <label class="bmd-label-floating">Detalles:</label> -->
                            <textarea class="form-control" name="examen_fisico" rows="3">{{old('examen_fisico')}}</textarea>
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
                          <label >Examenes complementarios</label>
                          <div class="form-group">
                          <!--   <label class="bmd-label-floating">Detalles:</label> -->
                            <textarea class="form-control" name="examen_complementario" rows="3">{{old('examen_complementario')}}</textarea>
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
                          <label>Cultivos</label>
                          <textarea class="form-control" name="cultivo" rows="2">{{old('cultivo')}}</textarea>
                             @if ($errors->has('cultivo'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('cultivo')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                             
                        </div>
                      </div>
                    </div>

                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label >Comentarios</label>
                          <div class="form-group">
                          <!--   <label class="bmd-label-floating">Detalles:</label> -->
                            <textarea class="form-control" name="comentarios" rows="4">{{old('comentarios')}}</textarea>
                             @if ($errors->has('comentarios'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('comentarios')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
                                
                          </div>
                        </div>
                      </div>
                    </div>

                   


                    <div class="col-lg-4 col-md-12">
                    <button type="submit" onclick="btn_guardar()" class="btn btn-primary pull-right">Guardar</button>
                    </div>
                  </form>
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