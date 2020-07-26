
@include('layouts/header')
@include('layouts/sidebar')
@include('layouts/nav')

<div class="content">
        <div class="container-fluid">

{!! Form::open() !!}
  @include('diagnosticos.form.createDiagnostico')
  {!! link_to('#', $title = 'Registrar', $attributes = ['id'=>'registrar', 'class'=>'btn btn-primary'],$secure = null) !!}

{!! Form::close() !!}

</div>
</div>

@include('layouts/footer')

