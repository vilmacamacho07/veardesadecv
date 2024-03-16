@extends("theme.$theme.layout")
@section('titulo')
Transporte
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/gondola/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @csrf
        @include('includes.mensaje')
        <div class="card">
            <div class="card-header bg-lightblue">
                <h3 class="card-title">Transporte</h3>
                <div class="card-tools">
                    <a href="{{route('crear_gondola')}}" class="btn bg-navy btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            {{-- <th class="width20">ID</th> --}}
                            <th>#Placas Tracto</th>
                            <th>#Placas Gondola 1</th>
                            <th>#Placas Gondola 2</th>
                            <th>Tipo</th>
                            <th>Conductor</th>
                            <th>mt3</th>
                            <th>Supervisor del Transporte</th>
                            <th>Status</th>
                            <th class="width80"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gondola as $gondo)
                        <tr>
                            {{-- <td>{{$gondo->id}}</td> --}}
                            <td><a href="{{route('ver_gondola', $gondo)}}" class="ver-gondola">{{$gondo->placas_truck}}</a></td>
                            <td>{{$gondo->placas_gondola1}}</td>
                            <td>{{$gondo->placas_gondola2}}</td>
                            <td>{{$gondo->tipo_transporte}}</td>
                            <td>{{$gondo->conductor_names}} {{$gondo->conductor_apellidos}}</td>
                            <td>{{$gondo->mt3}}</td>
                            <td>{{$gondo->name_admin_flete}}</td>
                            <td>{{$gondo->status}}</td>
                            <td style="text-align: center;">
                                <a href="{{route('editar_gondola', ['id' => $gondo->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fa fa-edit" ></i>
                                </a>
                            </td>
                            <td >
                                <form action="{{route('eliminar_gondola', ['id' => $gondo->id])}}" class="d-inline form-eliminar" method="POST">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro" >
                                        <i class="fa fa-times-circle text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-ver-gondola" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Gondola </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection
