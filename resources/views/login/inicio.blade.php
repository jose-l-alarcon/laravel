<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sistema de Historias Clínicas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css')}}">


<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('cssLogin/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('cssLogin/main.css')}}">




<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

		    
		    <!-- Errores de validaciones para iniciar sesion -->
		      <div class="row">
			    <div class="col-md-9">
			   <!-- devuelve verdadero si existe algun error  -->
			        @if ($errors->any())
			      
			        @endif
			      </div>
			    </div>

				<form class="login100-form validate-form" action="{{url('iniciar')}}" method="post">
						 {!!csrf_field()!!}  
					<span class="login100-form-title p-b-34">
						Sistema de historias clínicas
					</span>
					
					
					
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">

						<input class="input100" type="text" name="email" placeholder="Email" value="{{old('email')}}">
						

						<span class="focus-input100"></span>

					     @if ($errors->has('email'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('email')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
				   
				      
						
					 </div>



					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="password" placeholder="Contraseña">
						<span class="focus-input100"></span>
                         
                           @if ($errors->has('password'))
                     <!-- preguntar si la vsriable contiene algiun error -->
                           <p style="color:#FF0000";>{{$errors->first('password')  }}</p>
                           <!-- $errors->first imprime el primer error encontrado -->
                           @endif
				
				
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Iniciar sesión
						</button>
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							
						</span>

						<a href="" class="txt2">
							Bienvenido al sistema
						</a>
					</div>

					<div class="w-full text-center">
						<a href="" class="txt3">
							HOSPITAL PEDIÁTRICO JUAN PABLO II
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('img/login.jpg');"></div>
				<!-- "{{ asset('cssLogin/util.css')}}"

				url('images/bg-01.jpg') -->
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	


</body>
</html>