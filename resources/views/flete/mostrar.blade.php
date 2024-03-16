@extends("theme.$theme.layout")
@section('titulo')
Fletes
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/flete/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/flete/imprimir.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')

<div class="row">
    <div class="col-lg-12">
        @csrf
        @include('includes.mensaje')
        <div class="card ">
            <div class="card-header bg-lightblue">
                <h3 class="card-title">Información del Flete</h3>
                <div class="card-tools">
                    <a href="{{route('flete')}}" class="btn bg-navy btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <br>
                        <div class="boarding-pass color" id="imprimir">
                            <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}" media="print">
                            
                            <header>
                                <div class="flight" >
                                  <strong >Ticket #{{$flete->id}}</strong>
                                </div>
                            </header>
                            
                            <section class="cities" >
                                <div class="city"  style="width:100%;text-align:left">
                                  <small>ORIGEN</small>
                                  <strong>{{$flete->origen}}</strong>
                                </div>
                                
                                <div  class="city" style="background-color:#c2dbeb; width:100%; text-align:center" >
                                 <i class="fas fa-route fa-2x"></i>
                                </div>

                                <div class="city"  style=" width:100%;text-align:right">
                                  <small>DESTINO</small>
                                  <strong>{{$flete->destino}}</strong>
                                </div>
                            </section>
                           
                            <section class="infos">
                                 <div class="places">
                                    <div class="box">
                                    <small>STATUS</small>
                                    <strong><em>{{$flete->status}}</em></strong>
                                    </div>
                                    <div class="box">
                                        <small>TIPO</small>
                                        <strong>{{$gondola->tipo_transporte}}</strong>
                                        </div>
                                    <div class="box">
                                    <small>MINA</small>
                                    <strong>{{$flete->mina}}</strong>
                                    </div>
                                    <div class="box">
                                    <small>KM</small>
                                    <strong>{{$flete->km}}</strong>
                                    </div>
                                    
                                </div>
                                <div class="places">
                                    <div class="box">
                                    <small>FECHA SALIDA</small>
                                    <strong>{{$flete->fecha_salida}}</strong>
                                    </div>
                                    <div class="box">
                                    <small>HORA SALIDA</small>
                                    <strong>{{$flete->hora_salida}}</strong>
                                    </div>
                                    <div class="box">
                                    <small>FECHA LLEGADA</small>
                                    <strong>{{$flete->fecha_llegada ?? '-'}}</strong>
                                    </div>
                                    <div class="box">
                                    <small>HORA LLEGADA</small>
                                    <strong>{{$flete->hora_llegada ?? '-'}}</strong>
                                    </div>
                                </div>
                            </section>

                            
                            <section class="strap">
                                <div class="box">
                                    <div class="passenger">
                                        <small>PLACAS:</small>
                                        <strong>{{$gondola->placas_truck}}</strong>
                                    </div>
                                    <div class="date">
                                        <small>CONDUCTOR</small>
                                        <strong>{{$gondola->conductor_names}}  {{$gondola->conductor_apellidos}}</strong>
                                    </div>
                                    
                                    <div class="date">
                                        <small>MT3</small>
                                        <strong>{{$gondola->mt3}} </strong>
                                    </div>
                                    <div class="date">
                                        <small>SUPERVISOR TRANSPORTE</small>
                                        <strong>{{$gondola->name_admin_flete}} </strong>
                                    </div>
                                    <br>
                                    <div class="visible-print text-center">
                                        {!! QrCode::size(150)->generate(Request::url()); !!}
                                    </div>
                                </div>    
                                
                            

                            </section>
                            <br>
                            
                        </div>  
                        {{-- <input type="button" onclick="printDiv('areaImprimir')" value="imprimir div" /> --}}
    
                <br>            
                                       
            </div>
             <!-- Botón para imprimir el ticket -->
    <button onclick="window.print()">Imprimir Ticket</button>
        </div>
    </div>
                                
</div>
 
@endsection
