<style type="text/css">
  
table.blueTable {
  border: 1px solid #0A210C;
  width: 100%;
  text-align: left;
  border-collapse: collapse;

}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
}
table.blueTable thead {
 
}
table.blueTable thead th {
  font-size: 15px;


  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}
.page-break {
    page-break-after: always;
}

 @page { size: 30cm 21cm landscape; }

td.sinborde{
  border-right: hidden;

}
</style>


  <h3 align="center"><strong>EVOLUCION DIARIA</strong></h3>
<table class="blueTable" style="margin: 0 auto;">

<tbody>
<tr>
<td align="center" rowspan="2"> <img style="width:70px; height:60px;" src="img/icono.jpg"></td>
<td colspan="5" align="center" rowspan="1"><strong><u>HOSPITAL PEDIATRICO "JUAN PABLO II"</u><br>INTERNACION INDIFERENCIADA</strong></td>
</tr>
  <tr rowspan="1">
                  <td cellspacing="2" bgcolor="#F4F6F6"><strong>Obra social</strong></td>
                  <td colspan="4">{{$datospaciente->obra_social}}</td>
            </tr>
              <tr>
                  <td align="center" bgcolor="#F4F6F6"><strong>APELLIDOS Y <br> NOMBRES</strong></td>
                  <td align="center" colspan="5" ><strong>{{$datospaciente->apellido}}
                    {{$datospaciente->nombre}} </strong>
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
                   <td align="center">{{$datospaciente->edad}}</td>
                   <td align="center" bgcolor="#F4F6F6"><strong>Fecha <br>ingreso</strong></td>
                   <td align="center">{{ date("d-m-Y", strtotime($datospaciente->fecha_entrada)) }}</td>
                   <td align="center" bgcolor="#F4F6F6"><strong>Fecha de <br>evolución</strong></td>
                   <td align="center">{{ date("d-m-Y", strtotime($datospaciente->fecha_evolucion))}}</td>
              </tr>
              <!-- detalles diagnosticos -->
               <tr>
                  <td align="center"  bgcolor="#F4F6F6"><strong>DIAGNOSTICOS</strong></td>
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
                  <td align="center" bgcolor="#F4F6F6" class="sinborde"><strong>MEDICACION</strong></td>
                  <td align="center" colspan="1" bgcolor="#F4F6F6"><strong>DESCRIPCION</strong></td>
                  <td align="center" colspan="2" bgcolor="#F4F6F6"><strong>DOSIS</strong></td>
                  <td align="center" colspan="1" bgcolor="#F4F6F6"><strong>DIA DE INICIO</strong></td>
                  <td align="center" colspan="1" bgcolor="#F4F6F6"><strong>DIAS
                 </strong></td>
                 
              </tr>
               @foreach ($detallesMedicina as $detallesMedicina)
              <tr> 
                  <td align="center" colspan="1">{{$loop->iteration}}  </td>
                  <td style="border-right: hidden;" colspan="1">{{$detallesMedicina->medicacion}}</td>
                  <td colspan="2" >{{$detallesMedicina->dosis}}</td>
                  <td align="center" colspan="1" > {{ date("d/m/Y", strtotime($detallesMedicina->dia_inicio)) }}</td>
                  <td align="center" colspan="1" >{{$detallesMedicina->dias}}</td>
            
              </tr>
                   @endforeach

              <tr>
                  <td align="center" bgcolor="#F4F6F6"><strong>APORTE ORAL</strong></td>
                  <td colspan="5">{{$datospaciente->aporte_oral}}</td>
                 
              </tr>

               <tr>
                  <td  align="center"  bgcolor="#F4F6F6"><strong>Examen fisico</strong></td>
                   <td colspan="5">{{$datospaciente->examen_fisico}}

                   </td>
              </tr>

              <tr>
                  <td  align="center" bgcolor="#F4F6F6"><strong>Examenes <br> complementarios</strong></td>
                  <td colspan="5" >{{$datospaciente->examen_complementario}}</td>
                 
              </tr>

              <tr>
                  <td align="center" bgcolor="#F4F6F6"><strong>CULTIVOS</strong></td>
                  <td colspan="5" >{{$datospaciente->cultivo}}</td>
                 
              </tr>

               <tr>
                    <td  align="center" bgcolor="#F4F6F6"><strong>Comentarios</strong></td>

                  <td colspan="5">{{$datospaciente->comentarios}}</td>
              </tr> 

               <tr>
                    <td  align="center" bgcolor="#F4F6F6"><strong>Aspecto social</strong></td>

                  <td  align="justify" colspan="5">{{$datospaciente->aspecto_social}}</td>
              </tr>   
  




</tbody>
</table>