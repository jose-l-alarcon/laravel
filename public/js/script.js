$(document).ready(function(){ 
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
     }
 }); 

 // a.delete-record: boton eliminar 
 // $('#formModal').modal('show');
   
$('#registrar').click(function(){
              
            var dato = $("#detalle_diagnostico").val();
		    var route = "http://127.0.0.1:8000/store";

		   

		   $.ajax({
		    url: route,
		    type:'POST',
		    datatype:'json',
		    data: {detalle_diagnostico:dato}
        

		   });
});
});