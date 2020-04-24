  
$(document).ready(function () {
   
$('#btn_guardarPaciente').click(function(){
              
            var dni = $("#dni").val();
		    var route = "{{route('agregarUsuario')}}";
		    var dataString = "dni="+dni;

		   

		   $.ajax({
		    url:route,
		    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		    type:'post',
		    datatype:'json',
		    data: dataString ,
            success:function(data)
            {

            },
            error:function(data)
            {
             console.log(data);
            }

		   })
});
});