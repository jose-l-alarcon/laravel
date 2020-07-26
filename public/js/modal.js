$(document).ready(function(){


  
     // a.delete-record: boton eliminar 
    $('table').on('click','a.delete-record', function (event) {
        event.preventDefault();
        // para que no redireccione al href route relacionado al evento
      
        $('#form-delete').attr('action', $(this).attr('href'));
        // agregar al formulario modal , attr action el atriibito href: agrega el 
        // action para redireccionar al controlador para eliminar el diagnostico

        $('#modal-delete').modal('show');
        // abrir la ventana modal para eliminar
      
    });



     $('#yes-delete').on('click', function () {
        $('#modal-delete').modal('hide');

        $.ajax({
            type: $('#form-delete').attr('method'),
            url: $('#form-delete').attr('action'),
           data: { '_token': token, 'someOtherData': someOtherData },
            success: function (data) {
          
                if (data.response) {
              
                    $('table tr').each(function () {
                    
                        if ($(this).data('id') == data.id) {
                        	
                            $(this).fadeOn(); 
                          
                        }
                    });
                 
                    // toastr.success(data.message);
                  
                } else {
                     
                  
                }
            },
            error: function () {
             
                  alert(error);
            }
               
            });

         });

        });


