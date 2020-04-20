
<body class="">
 <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a  href="{{ url('/Admin') }}" class="simple-text logo-normal">
        dashboard
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          
         <li class="nav-item active">
            <a class="nav-link" href="{{ url('/nuevoUsuario') }}">
              <i class="material-icons">person_add</i>
              <p>Agregar paciente</p>
            </a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/Admin') }}">
              <i class="material-icons">people_alt</i>
              <p>Lista de pacientes</p>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="{{ url('/diagnosticos') }}">
              <i class="material-icons">content_paste</i>
              <p>Evolución diaria</p>
            </a>
          </li>
         
        </ul>
      </div>
    </div>
