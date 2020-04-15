

  // con esta funcion al presionar el boton agregar llama a la 
  //funcion para agregar el diagnostico a la tabla
 
 $(document).ready(function () {
   
           $('#btn_add').click(function(){
             agregar();
           });
          });



    // Contador utilizado como index de los detalles que se van agregando
    var cont=0;
   
    function agregar(){
          detalles = $("#detalle_diagnostico").val();

          if (detalles!="")
          {

            var fila='<tr class="selected" id="filas'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><textarea class="sinborde" cols="60" name="detalles[]" readonly>'+detalles+'</textarea></td></tr>';
            cont++;
            limpiar();
            $('#tabladetalle').append(fila);
          }
          else{

            alert("Error al ingresar el diagnóstico, el campo esta vacio");
          }

        }

      function eliminar(index) {

         $('#filas' + index).remove();
        }
        


   function limpiar(){
         $("#detalle_diagnostico").val("");
        }
//Aqui finaliza las funciones para agregar el diagnostico a la tabla detalleDiagnostico

//funciones para agregar nuevos comentarios
 $(document).ready(function () {
   
           $('#btn_add1').click(function(){
             agregar1();
           });
          });


//funciones para agregar medicacion
 $(document).ready(function () {
   
           $('#btn_add2').click(function(){
             agregar2();
           });
          });



    // Contador utilizado como index de los detalles que se van agregando
    var cont2=0;
   
    function agregar2(){
          detallesMedicacion = $("#medicacion").val();
          detallesDosis = $("#dosis").val();
          detallesFecha = $("#dia_inicio").val();

          if (detallesMedicacion!="" && detallesDosis!="" && detallesFecha!="") 
          { 

            var fila2='<tr class="selected" id="filas2'+cont2+'"><td><button type="button" class="btn btn-warning" onclick="eliminar2('+cont2+');">X</button></td><td><td><textarea name="detallesMedicacion[]" class="sinborde" cols="15" readonly>'+detallesMedicacion+'</textarea></td><td><textarea name="detallesDosis[]" class="sinborde" cols="15" readonly>'+detallesDosis+'</textarea></td><td><input type="text" class="sinborde" cols="15" name="detallesFecha[]" value="'+detallesFecha+'"></td></tr>';
            cont2++;
            limpiar2();
            $('#tablamedicacion').append(fila2);
          }
          else{

            alert("Error al ingresar la medicación , complete los campos");
          }

        }

      function eliminar2(index) {

         $('#filas2' + index).remove();
        }
        


   function limpiar2(){
         $("#medicacion").val("");
         $("#dosis").val("");
         $("#dia_inicio").val("");

        }

//finaliza funciones para agregar comentarios

   

//validar campos del formulario sin reacargar la pagina 
   function btn_guardar(){
      jQuery.validator.messages.required = 'Campo obligatorio';
      $('#form').validate({ // initialize the plugin

        rules: {

            fecha_entrada: {

                required: true

            },

            nrohistoria_clinica: {

                required: true,

              

            },

            nrohabitacion: {

                required: true,

                

            },

            nrocama: {

                required: true,
       

            },
            bipap: {

                required: true

            },
            traqueostomia: {

                required: true

            },
            SNG: {

                required: true

            },
            sonda_vesical: {

                required: true

            },
            signo_vital_peso: {

                required: true

            },
            signo_vital_FC: {

                required: true

            },
            signo_vital_FR: {

                required: true

            },
             signo_vital_Sat: {

                required: true

            },
             signo_vital_temperatura: {

                required: true

            },
             aporte_oral: {

                required: true

            },
             examen_fisico: {

                required: true

            },
            examen_complementario: {

                required: true

            },
             cultivo: {

                required: true

           },
           comentarios: {

                required: true

           },

           aspecto_social: {

                required: true

           },
           
        }
    });  
    }
 

              

        




   



