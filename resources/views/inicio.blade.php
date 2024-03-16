@extends("theme.$theme.layout")
@include('includes.mensaje')

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @csrf
        @include('includes.mensaje')
        <div class="text-center">
            
                <a href="/" >
                    <img src="{{asset("assets/$theme/dist/img/icstrucks/logonvp.png")}}"  style="width: 50%">
                </a>
          
        </div>
    </div>
</div>
@endsection
