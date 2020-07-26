<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"> -->
<!--   <link rel="icon" type="image/png" href="../assets/img/favicon.png"> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>
    Sistema de historias clinicas
  </title>
  <link rel="icon" type="image" href=" {{ asset ('img/icono.jpg')}}">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link  href="{{ asset('css/material-dashboard-rtl.css')}}" rel="stylesheet" />
<!-- 
   estilos de las notificaciones con VUE -->
  <link  href="{{ asset('css/app.css')}}" rel="stylesheet" />


  <link href="{{ asset('css/material-dashboard.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('css/material-dashboard.min.css')}}" rel="stylesheet" />

   
   <script src="{{ asset ('js/jquery-3.5.0.js')}}"></script>


 <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<!-- JQUERY YA ESTA INCLUIDO EN LARAVEL -->













  <!-- Estilo para quitar bordes de los texarea de los dignosticos generados (vista agregar diagnostico)-->
 <style>
 
  .sinborde {
    border: 0;
  }

  .error{
    color: red;
  }

</style>

  

</head>