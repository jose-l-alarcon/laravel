<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{ asset('css/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{ asset('css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/matrix-media.css') }}" />
<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset ('css/jquery.gritter.css')}}" />


<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>


</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bienvenido usuario</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> Mi perfil</a></li>
        <li class="divider"></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Cerrar sesión </a></li>
      </ul>
    </li>

  </ul>
</div>
<!--close-top-serch-->
