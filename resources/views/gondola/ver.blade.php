<div>{{$gondola->placas_truck}}</div>
<div>{{$gondola->placas_gondola1}}</div>
<div>{{$gondola->placas_gondola2}}</div>
<div>{{$gondola->tipo_transporte}}</div>
<div>{{$gondola->conductor_names}} {{$gondola->conductor_apellidos}}</div>
<div>{{$gondola->mt3}}</div>
<div>{{$gondola->name_admin_flete}}</div>
<div><img src="{{Storage::url("imagenes/gondolas/$gondola->foto")}}" alt="Documentos Conductor" width="30%"></div>
<div><img src="{{Storage::url("imagenes/gondolas/$gondola->licencia")}}" alt="Documentos Conductor" width="30%"></div>
<div><img src="{{Storage::url("imagenes/gondolas/$gondola->seguro")}}" alt="Documentos Conductor" width="30%"></div>

