@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

      <div class="content">
                

        <div class="container-fluid">
        
        <div class="row">
         <div class="col-md-6 ml-auto mr-auto">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a>
                    <img class="img" src=" {{ asset ('img/faces/images.png')}}" />

                  </a>
                </div>
                <div class="card-body"> 
                  <h6 class="card-category text-gray">Datos del paciente :</h6>
                  <h4 class="card-title">{{$paciente->apellido}} {{$paciente->nombre}}</h4>
                  <p class="card-description">
                     
                     
                          <div class="txt"> 
                            DNI: <span class="date badge badge-info">{{$paciente->dni}}</span>
                            Género: <span class="date badge badge-info">{{$paciente->genero}}</span>
                            Fecha Nacimiento<span class="date badge badge-info"> {{ date("d/m/Y", strtotime($paciente->fecha_nacimiento))}}</span>
                          </div>
                     
                          <div class="txt"> 
                          Edad: <span class="date badge badge-info"> {{$paciente->edad}} años</span>
                          Obra Social <span class="date badge badge-info">{{$paciente->obra_social}}</span>
                         </div>
                          
                     
                    
                          <div class="txt"> Localidad <span class="date badge badge-info">{{$paciente->localidad}}</span> 
                          Provincia <span class="date badge badge-info">{{$paciente->provincia}}</span></div>
                         
                          <br/>
                          <div class="stats">
                          <i class="material-icons text-success">arrow_back</i>
                          <a  href="{{route ('Admin')}}"> Regresar al listado</a>
                         </div>
      
             

                  </p>
                
                </div>
              </div>
            </div>
          </div>

      </div>

      @include('layouts/footer')

    