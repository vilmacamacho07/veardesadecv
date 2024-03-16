@extends("theme.$theme.layout")
@section('titulo')
Fletes
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/flete/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/flete/imprimir.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/flete/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="card ">
            <div class="card-header bg-olive">
                <h3 class="card-title">Editar Flete - {{$flete->id}}</h3>
                <div class="card-tools">
                    <a href="{{route('flete')}}" class="btn bg-navy btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
            <form action="{{route('flete.actualizar', $flete->id)}}"  method="POST" id="form-general" class="form-horizontal form--label-right" autocomplete="off" enctype="multipart/form-data">
                @csrf @method("put")
                <div class="card-body">
                    
                    <div class="form-group row">
                        <label for="gondola_id" class="col-lg-3 col-form-label requerido">Gondola</label>
                        <div class="col-lg-8">
                            <input type="text" name="gondola_id" id="gondola_id" class="form-control" value="{{$flete->gondola_id}}"  readonly  required/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="origen" class="col-lg-3 col-form-label requerido" >Origen</label>
                        <div  class="col-lg-8">
                            <input type="text" name="origen" id="origen" class="form-control" value="{{$flete->origen}}"  required/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="destino" class="col-lg-3 col-form-label requerido" >Destino</label>
                        <div  class="col-lg-8">
                            <input type="text" name="destino" id="destino" class="form-control" value="{{$flete->destino }}"  required/>
                        </div>
                    </div>


                    
                    <div class="form-group row">
                        <label for="mina" class="col-lg-3 col-form-label requerido" >Mina</label>
                        <div  class="col-lg-8">
                            <input type="text" name="mina" id="mina" class="form-control" value="{{$flete->mina }}"  required/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="km" class="col-lg-3 col-form-label requerido" >KM</label>
                        <div  class="col-lg-8">
                            <input type="number" id="km" name="km" class="form-control" value="{{$flete->km }}"  min="0" max="5000"  required/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="cliente" class="col-lg-3 col-form-label requerido">Cliente</label>
                        <div class="col-lg-8">
                        <input type="text" name="cliente" id="cliente" class="form-control" value="{{ $flete->cliente}}" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="material" class="col-lg-3 col-form-label requerido">Material</label>
                        <div class="col-lg-8">
                        <input type="text" name="material" id="material" class="form-control" value="{{$flete->material}}" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="notas" class="col-lg-3 col-form-label requerido">Notas</label>
                        <div class="col-lg-8">
                        <input type="text" name="notas" id="notas" class="form-control" value="{{$flete->notas}}" />
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="fecha_salida" class="col-lg-3 col-form-label requerido">Fecha de Salida</label>
                        <div class="col-lg-8">
                      <!--<input type="text" name="fecha_salida" id="fecha_salida" class="form-control" value="{{old('fecha_salida', date('Y-m-d'))}}"  readonly  required/> -->
                        <input type="date" name="fecha_salida" id="fecha_salida" class="form-control" value="{{ $flete->fecha_salida}}"  min="2023-01-01" max="2025-12-31"  required/>
                        
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="hora_salida" class="col-lg-3 col-form-label requerido">Hora de Salida</label>
                        <div class="col-lg-8">
                       <!-- <input type="time" name="hora_salida" id="hora_salida" class="form-control" tz="Indian/Chagos" value="<?php date_default_timezone_set('America/Mexico_City'); echo(date('H:i:s') );?>" readonly  required/> -->
                        <input type="time" name="hora_salida" id="hora_salida" class="form-control" tz="Indian/Chagos" value="{{ $flete->hora_salida}}"  required/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fecha_llegada" class="col-lg-3 col-form-label requerido">Fecha de Salida</label>
                        <div class="col-lg-8">
                      <!--<input type="text" name="fecha_salida" id="fecha_salida" class="form-control" value="{{old('fecha_salida', date('Y-m-d'))}}"  readonly  required/> -->
                        <input type="date" name="fecha_llegada" id="fecha_llegada" class="form-control" value="{{ $flete->fecha_llegada}}"  min="2023-01-01" max="2025-12-31"  required/>
                        
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="hora_llegada" class="col-lg-3 col-form-label requerido">Hora de Salida</label>
                        <div class="col-lg-8">
                       <!-- <input type="time" name="hora_salida" id="hora_salida" class="form-control" tz="Indian/Chagos" value="<?php date_default_timezone_set('America/Mexico_City'); echo(date('H:i:s') );?>" readonly  required/> -->
                        <input type="time" name="hora_llegada" id="hora_llegada" class="form-control" tz="Indian/Chagos" value="{{ $flete->hora_llegada}}"  required/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="fecha_pago" class="col-lg-3 col-form-label requerido">Fecha de pago</label>
                        <div class="col-lg-8">
                        <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" value="{{$flete->fecha_pago}}"  min="2023-01-01" max="2025-12-31"  required/>
                    </div>
                    </div>
                    
                   
                    {{-- <div class="form-group row">
                        <label for="fecha_llegada" class="col-lg-3 col-form-label requerido">Fecha de llegada</label>
                        <div class="col-lg-8">
                        <input type="text" name="fecha_llegada" id="fecha_salida" class="form-control" value="{{old('fecha_salida', date('Y-m-d'))}}"  readonly  required/>
                        </div>
                    </div> --}}

                   
                    <div class="form-group row">
                        <label for="creado_por" class="col-lg-3 col-form-label requerido" >Creado por</label>
                        <div class="col-lg-8">
                        <input type="text" name="creado_por" id="creado_por" class="form-control" value="{{$flete->creado_por}}" readonly  required/>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include('includes.boton-form-editar')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
