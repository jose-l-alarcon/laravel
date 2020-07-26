@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')
  <div class="content">
        <div class="container-fluid">

  <div class="row">
         <div class="col-md-12">
       <a href="{{route ('pdf',$datospaciente->iddiagnostico)}}" class="btn btn-round btn-fill btn-danger">PDF</a>
      <a href="{{route('actualizarDiagnostico',$datospaciente->iddiagnostico)}}" class="btn btn-round btn-fill btn-info">Actualizar</a>
          </div>
   </div>

	 <div class="row">
            <div class="col-md-12 ml-auto mr-auto">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Evolución diaria - Fecha: {{ date("d-m-Y", strtotime($datospaciente->fecha_evolucion))}}</h4>
                  <p class="card-category">Paciente: {{$datospaciente->apellido}}
				  {{$datospaciente->nombre}} - <u>Habitación:</u> {{$datospaciente->nrohabitacion}}  <u>Cama:</u> {{$datospaciente->nrocama}} </p>
				  <p> Ingreso el día: {{ date("d-m-Y", strtotime($datospaciente->fecha_entrada)) }} - Dias internado {{$datospaciente->dias_internacion}}   
                </div>
                <div class="card-body">
                  <div class="table-responsive table-upgrade">
                    <table class="table">
                      <thead>
                        <tr>
                          <th></th>
                          <th class="text-center"></th>
                          <th class="text-center"></th>
                          <th class="text-center"></th>
                          <th class="text-center"></th>
                          <th class="text-center"></th>


             
                        </tr>

                        <tr>
							    <td bgcolor="#F4F6F6"><strong>APELLIDOS Y  NOMBRES</strong></td>
							    <td align="center" colspan="5" >{{$datospaciente->apellido}}
							    	{{$datospaciente->nombre}}
							    </td>
					    </tr>

					       <tr>
							    <td  bgcolor="#F4F6F6"><strong>HC Num</strong></td>
							    <td align="center" colspan="5" >{{$datospaciente->hcnum}}</td>
							</tr>

                         <tr >
							    <td bgcolor="#F4F6F6"><strong>Días de internación</strong></td>
							   
							    <td align="center"  colspan="5">{{$datospaciente->dias_internacion}}</td>
							   
							    

					     </tr>

					     <tr>
							     <td bgcolor="#F4F6F6"><strong>Edad</strong></td>
							     <td align="center">{{$datospaciente->edad}}</td>
							     <td bgcolor="#F4F6F6"><strong>Fecha ingreso</strong></td>
							     <td >{{ date("d-m-Y", strtotime($datospaciente->fecha_entrada))}}</td>
							     <td bgcolor="#F4F6F6"><strong>Fecha de evolución</strong></td>
							     <td align="center">{{ date("d-m-Y", strtotime($datospaciente->fecha_evolucion))}}</td>
						</tr>

						 <tr>
							    <td bgcolor="#F4F6F6"><strong>Diagnósticos </strong></td>
							    <td bgcolor="#F4F6F6"></td>
							    <td bgcolor="#F4F6F6"></td>
							     <td bgcolor="#F4F6F6"></td>
							     <td bgcolor="#F4F6F6"></td>
							     <td bgcolor="#F4F6F6"></td>
						 </tr>
				             
		              @foreach ($detalles as $detalles)
		            
					<tr>
				     <td bgcolor="#F4F6F6">{{$loop->iteration}}</td>

                     <td colspan="5">{{ $detalles->detalle_diagnostico }}</td>
               
				    
				   	</tr>
				   	 @endforeach
		
						<!-- detalles diagnosticos -->
					      <tr>
							    <td  bgcolor="#F4F6F6"><strong>Bipap</strong></td>
							     <td>{{$datospaciente->bipap}}</td>		
							     <td bgcolor="#F4F6F6"><strong><u>SIGNOS VITALES:
							     </u></strong> &nbsp; &nbsp;<strong> TA: </strong> </td>
							     <td bgcolor="#F4F6F6">{{$datospaciente->signo_vital_ta}}</td>	
							     <td bgcolor="#F4F6F6"><strong>PESO:</strong></td>	
							     <td>{{$datospaciente->signo_vital_peso}}</td>		
							</tr>

					  <tr>
							    <td bgcolor="#F4F6F6"><strong>Traqueostomia</strong></td>
							     <td >{{$datospaciente->traqueostomia}}</td>	
							     <td  bgcolor="#F4F6F6" ><strong>FC</strong></td>
							     <td >{{$datospaciente->signo_vital_FC}}</td>		
							     <td  bgcolor="#F4F6F6" ><strong>Sat O2</strong></td>		
							     <td >{{$datospaciente->signo_vital_Sat}}%</td>				
					   </tr>

					   <tr>
							    <td  bgcolor="#F4F6F6"><strong>SNG</strong></td>
							     <td >{{$datospaciente->SNG}}</td>		
							     <td a bgcolor="#F4F6F6" colspan="1"><strong>FR</strong></td>
							     <td>{{$datospaciente->signo_vital_FR}}</td>		
							     <td bgcolor="#F4F6F6" ><strong>T°</strong></td>		
							     <td colspan="1">{{$datospaciente->signo_vital_temperatura}}°</td>				
							</tr>

					  <tr>
							    <td  bgcolor="#F4F6F6"><strong>Sonda Vesical</strong></td>
							    <td>{{$datospaciente->sonda_vesical}}</td>
							    <td></td>
							   
					  </tr>

					   <tr>
							    <td  bgcolor="#F4F6F6"><strong>BALANCE</strong></td>
							    <td><strong>INGRESO: {{$datospaciente->balance_ingreso}}</strong></td>
							    <td><strong>EGRESO: {{$datospaciente->balance_egreso}}</strong></td>
							    <td><strong>BALANCE: {{$datospaciente->balance_balance}}</strong></td>
							    <td><strong>FLUJO: {{$datospaciente->balance_flujo}}</strong></td>
							    <td></td>
							   
					  </tr>

					  <tr>
                           	<td align="center" bgcolor="#F4F6F6" colspan="6"><strong>Motivo consulta</strong></td> 
                           </tr>
                           <tr>
			
							    <td align="justify" colspan="6" >{!! nl2br($datospaciente->motivoConsulta) !!}</td>
							   
							</tr>



					  <tr>
							    <td  colspan="2" bgcolor="#F4F6F6"  style="border-right: hidden;"><strong>MEDICACION</strong></td>
							    <td  bgcolor="#F4F6F6" style="border-right: hidden;"><strong>DOSIS</strong></td>
					
							    <td bgcolor="#F4F6F6"><strong>DESDE</strong></td>
							    <td bgcolor="#F4F6F6"><strong>HASTA</strong></td>
							    <td bgcolor="#F4F6F6"><strong>DIAS
							   </strong></td>
							   
					  </tr>

					   @foreach ($detallesMedicina as $detallesMedicina)
							<tr> 
							    <td colspan="2" style="border-right: hidden;">{{$detallesMedicina->medicacion}}</td>
                                <td style="border-right: hidden;">{{$detallesMedicina->dosis}}</td>
							    <td>  @if(is_null($detallesMedicina->dia_inicio))
			                        <p></p>
			                        @else
			                        {{ date("d/m/Y", strtotime($detallesMedicina->dia_inicio)) }}
			                        @endif
                                 </td>
                                <td>  @if(is_null($detallesMedicina->fecha_fin))
			                        <p></p>
			                        @else
			                        {{ date("d/m/Y", strtotime($detallesMedicina->fecha_fin)) }}
			                        @endif
                                 </td>
							    <td>{{$detallesMedicina->dias}}</td>
						
							  </tr>
							   	 @endforeach

				       <tr>
							    <td bgcolor="#F4F6F6"><strong>APORTE ORAL</strong></td>
							    <td colspan="5">{!!nl2br($datospaciente->aporte_oral) !!}</td>
							   
					    </tr>

					       <tr>
							     <td bgcolor="#F4F6F6"><strong>Examen fisico</strong></td>
							     <td align="justify" colspan="5">{!! nl2br($datospaciente->examen_fisico) !!}</td>
							    <!--  nl2br: es para identificar los espacios y mostrar los datos de la misma forma que fueron guardados -->
							</tr>
							<tr>
							    <td  bgcolor="#F4F6F6"><strong>Examenes complementarios</strong></td>
							    <td align="justify" colspan="5" >{!! nl2br($datospaciente->examen_complementario) !!}</td>
							   
							</tr>

							<tr>
							    <td bgcolor="#F4F6F6"><strong>CULTIVOS</strong></td>
							    <td colspan="5" >{!! nl2br($datospaciente->cultivo) !!}</td>
							   
							</tr>

							 <tr>
							      <td bgcolor="#F4F6F6"><strong>Comentarios</strong></td>

							    <td  align="justify" colspan="5">{!! nl2br($datospaciente->comentarios) !!}</td>
							</tr>

							
                      </thead>
                    
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="stats">
                    <i class="material-icons text-success">arrow_back</i>
                    <a  href="{{route ('diagnosticos')}}"> Regresar a listado</a>
            </div>

      </div>
  </div>



@include('layouts/footer')