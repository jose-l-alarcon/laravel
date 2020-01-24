@include('layouts/header')
@include('layouts/sidebar')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
<div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Volver" class="tip-bottom"><i class="icon-home"></i>Regresar a inicio </a> 
    <h1></h1></div>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Error 404</h5>
          </div>
          <div class="widget-content">
            <div class="error_ex">
              <h1>404</h1>
              <h3>Página no encontrada.</h3>
            <!--   <p>We can not find the page you're looking for.</p> -->
              <a class="btn btn-warning btn-big"  href="{{route ('admin')}}">Regresar a inicio</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


    </div>
  </div>
</div>

  </div>
</div>

<!--end-main-container-part-->

@include('layouts/footer')
