@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')
  <div class="content">
        <div class="container-fluid">

  <div class="row">
         <div class="col-md-12">
       <a href="{{route ('pdf',$datospaciente->iddiagnostico)}}" class="btn btn-round btn-fill btn-default">PDF</a>
      <a href="{{route('actualizarDiagnostico',$datospaciente->iddiagnostico)}}" class="btn btn-round btn-fill btn-info">Actualizar</a>
          </div>
   </div>

     <h4 align="center"><strong>Vista previa</strong></h4>
              
	   <div class="col-md-12">
              <div class="card">
                <div class="card-body">
              

	<table class="table table-bordered">
		               <h3 align="center"><strong>Evolución diaria</strong></h3>
						<tr>
						<td align="center" rowspan="2"> <img style="width:70px; height:60px;"  align="center" src=" {{ asset ('img/icono.jpg')}}"/></td>

						<td colspan="5" align="center" rowspan="1"><strong>HOSPITAL PEDIATRICO "JUAN PABLO II"<br>INTERNACION INDIFERENCIADA</strong></td>
						</tr>

					     <tr rowspan="1">
							    <td cellspacing="2" bgcolor="#F4F6F6"><strong>Obra social</strong></td>
							    <td colspan="4">{{$datospaciente->obra_social}}</td>
						</tr>
							<tr>
							    <td align="center" bgcolor="#F4F6F6"><strong>APELLIDOS Y <br> NOMBRES</strong></td>
							    <td align="center" colspan="5" >{{$datospaciente->apellido}}
							    	{{$datospaciente->nombre}}
							    </td>
							   
							</tr>
						   <tr>
							    <td align="center" bgcolor="#F4F6F6"><strong>HC Num</strong></td>
							    <td align="center" colspan="5" >{{$datospaciente->nrohistoria_clinica}}</td>
							</tr>
							 <tr>
							    <td align="center" bgcolor="#F4F6F6"><strong>Días de <br>internación</strong></td>
							    <td align="center" colspan="5" >{{$datospaciente->dias_internacion}}</td>
							</tr>
							<tr>
							     <td align="center" bgcolor="#F4F6F6"><strong>Edad</strong></td>
							     <td align="center">{{$datospaciente->edad}} años</td>
							     <td align="center" bgcolor="#F4F6F6"><strong>Fecha <br>ingreso</strong></td>
							     <td align="center">{{ date("d-m-Y", strtotime($datospaciente->fecha_entrada)) }}</td>
							     <td align="center" bgcolor="#F4F6F6"><strong>Fecha de <br>evolución</strong></td>
							     <td align="center">{{ date("d-m-Y", strtotime($datospaciente->fecha_evolucion))}}</td>
							</tr>
							<!-- detalles diagnosticos -->
							 <tr>
							    <td align="center"  bgcolor="#F4F6F6"><strong>Diagnósticos </strong></td>
							     <td colspan="5">
							</tr>
				             
				              @foreach ($detalles as $detalles)
				            
							<tr>
						     <td colspan="1" align="center">{{$loop->iteration}}</td>
                             <td colspan="5">{{ $detalles->detalle_diagnostico }}</td>
                       
						    
						   	</tr>
						   	 @endforeach
				
								<!-- detalles diagnosticos -->

							<tr>
							    <td align="center" bgcolor="#F4F6F6"><strong>Bipap</strong></td>
							     <td align="center" colspan="1">{{$datospaciente->bipap}}</td>		
							     <td align="center" colspan="3" bgcolor="#F4F6F6"><strong><u>SIGNOS VITALES:</u> PESO</strong></td>		
							     <td align="center" colspan="1">{{$datospaciente->signo_vital_peso}}</td>		
							</tr>

							<tr>
							    <td align="center" bgcolor="#F4F6F6"><strong>Traqueostomia</strong></td>
							     <td align="center" colspan="1">{{$datospaciente->traqueostomia}}</td>		
							     <td align="center" bgcolor="#F4F6F6" colspan="1"><strong>FC</strong></td>
							     <td align="center" colspan="1">{{$datospaciente->signo_vital_FC}}</td>		
							     <td align="center" bgcolor="#F4F6F6" colspan="1"><strong>Sat O2</strong></td>		
							     <td align="center" colspan="1">{{$datospaciente->signo_vital_Sat}}%</td>				
							</tr>

							<tr>
							    <td align="center" bgcolor="#F4F6F6"><strong>SNG</strong></td>
							     <td align="center" colspan="1">{{$datospaciente->SNG}}</td>		
							     <td align="center" bgcolor="#F4F6F6" colspan="1"><strong>FR</strong></td>
							     <td align="center" colspan="1">{{$datospaciente->signo_vital_FR}}</td>		
							     <td align="center" bgcolor="#F4F6F6" colspan="1"><strong>T°</strong></td>		
							     <td align="center" colspan="1">{{$datospaciente->signo_vital_temperatura}}°</td>				
							</tr>

							<tr>
							    <td align="center" bgcolor="#F4F6F6"><strong>Sonda Vesical</strong></td>
							    <td align="center" colspan="4" >{{$datospaciente->sonda_vesical}}</td>
							    <td align="center" colspan="1" ></td>
							   
							</tr>

							<tr>
							    <td align="center" bgcolor="#F4F6F6"  style="border-right: hidden;"><strong>MEDICACION</strong></td>
							    <td align="center" colspan="2" bgcolor="#F4F6F6" style="border-right: hidden;"><strong>DOSIS</strong></td>
							    <td align="center" colspan="2" bgcolor="#F4F6F6"><strong>DIA DE INICIO</strong></td>
							    <td align="center" colspan="1" bgcolor="#F4F6F6"><strong>DIAS
							   </strong></td>
							   
							</tr>
							 @foreach ($detallesMedicina as $detallesMedicina)
							<tr> 
							    <td style="border-right: hidden;">{{$detallesMedicina->medicacion}}</td>
                                <td align="center" style="border-right: hidden;" colspan="2" >{{$detallesMedicina->dosis}}</td>
							    <td align="center" colspan="2" > {{ date("d/m/Y", strtotime($detallesMedicina->dia_inicio)) }}</td>
							    <td align="center" colspan="1" >{{$detallesMedicina->dias}}</td>
						
							</tr>
							   	 @endforeach

							<tr>
							    <td align="center" bgcolor="#F4F6F6"><strong>APORTE ORAL</strong></td>
							    <td colspan="5">{{$datospaciente->aporte_oral}}</td>
							   
							</tr>

							 <tr>
							    <td WIDTH="200" HEIGHT="150" align="center"  bgcolor="#F4F6F6"><strong>Examen fisico</strong></td>
							     <td colspan="5">{{$datospaciente->examen_fisico}}</td>
							</tr>

							<tr>
							    <td WIDTH="200" HEIGHT="120" align="center" bgcolor="#F4F6F6"><strong>Examenes <br> complementarios</strong></td>
							    <td  WIDTH="200" HEIGHT="120" colspan="5" >{{$datospaciente->examen_complementario}}</td>
							   
							</tr>

							<tr>
							    <td align="center" bgcolor="#F4F6F6"><strong>CULTIVOS</strong></td>
							    <td colspan="5" >{{$datospaciente->cultivo}}</td>
							   
							</tr>

							 <tr>
							      <td WIDTH="200" HEIGHT="120" align="center" bgcolor="#F4F6F6"><strong>Comentarios</strong></td>

							    <td  align="justify" colspan="5">{{$datospaciente->comentarios}}</td>
							</tr>

							<tr >
							    <td rowspan="2" align="center" bgcolor="#F4F6F6"><strong>Aspecto social</strong></td>
							    <td colspan="5" rowspan="2">{{$datospaciente->aspecto_social}}</td>
							   
							</tr>
							
							

							</table>
					</div>
				</div>
			</div>

   <!-- termina la tabla -->

            <div class="stats">
                    <i class="material-icons text-success">arrow_back</i>
                    <a  href="{{route ('diagnosticos')}}"> Regresar al listado</a>
            </div>


		</div>


	</div>


@include('layouts/footer')