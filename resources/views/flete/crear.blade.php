@extends("theme.$theme.layout")
@section('creado_por')
   Flete
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/flete/crear.js")}}" type="text/javascript"></script>
<script> 
function buscar(){
    var opcion = document.getElementById('placas_trucks').value;
    alert(opcion);
} 
</script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        @include('includes.form-error')
        <div class="card ">
            <div class="card-header bg-olive">
                <h3 class="card-title">Crear Flete</h3>
                <div class="card-tools">
                    <a href="{{route('flete')}}" class="btn bg-navy btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
            <form action="{{route('flete.guardar')}}" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="card-body">                                            
                    @include('flete.form')
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include('includes.boton-form-crear')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
