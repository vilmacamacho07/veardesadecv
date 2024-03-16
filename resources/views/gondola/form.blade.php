<div class="form-group row">
    <label for="placas_truck" class="col-lg-3 col-form-label requerido">#Placa Tracto</label>
    <div class="col-lg-8">
    <input type="text" name="placas_truck" id="placas_truck" class="form-control" value="{{old('placas_truck', $gondola->placas_truck ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="placas_gondola1" class="col-lg-3 col-form-label requerido">#Placa Gondola 1</label>
    <div class="col-lg-8">
    <input type="text" name="placas_gondola1" id="placas_gondola1" class="form-control" value="{{old('placas_gondola1', $gondola->placas_gondola1 ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="placas_gondola2" class="col-lg-3 col-form-label requerido">#Placa Gondola 2</label>
    <div class="col-lg-8">
    <input type="text" name="placas_gondola2" id="placas_gondola2" class="form-control" value="{{old('placas_gondola2', $gondola->placas_gondola2 ?? '')}}" />
    </div>
</div>
<div class="form-group row">
    <label for="tipo_transporte" class="col-lg-3 col-form-label requerido" >TIpo de Transporte</label>
    <div  class="col-lg-8">
        <select name="tipo_transporte" id="tipo_transporte"  class="form-control"  required>
            <option disabled="disabled">Seleccione un transporte</option>
            <option value="Trailer">Trailer</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="conductor_names" class="col-lg-3 col-form-label requerido">Nombre del Conductor</label>
    <div class="col-lg-8">
    <input type="text" name="conductor_names" id="conductor_names" class="form-control" value="{{old('conductor_names', $gondola->conductor_names ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="conductor_apellidos" class="col-lg-3 col-form-label requerido">Apellidos del Conductor</label>
    <div class="col-lg-8">
    <input type="text" name="conductor_apellidos" id="conductor_apellidos" class="form-control" value="{{old('conductor_apellidos', $gondola->conductor_apellidos ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="mt3" class="col-lg-3 col-form-label requerido">mt3</label>
    <div class="col-lg-8">
    <input type="number" name="mt3" id="mt3" class="form-control" value="{{old('mt3', $gondola->mt3 ?? '')}}"  min="0" max="200"  required/>
    </div>
</div>

<div class="form-group row">
    <label for="name_admin_flete" class="col-lg-3 col-form-label">Supervisor de la Gondola</label>
    <div class="col-lg-8">
    <input type="text" name="name_admin_flete" id="name_admin_flete" class="form-control" value="{{old('name_admin_flete', $gondola->name_admin_flete ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="foto" class="col-lg-3 col-form-label">Hoja Cubicación</label>
    <div class="col-lg-5">
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($gondola->foto) ? Storage::url("imagenes/gondolas/$gondola->foto") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Documentos+Hoja Cubicación"}}" accept="image/*"/>
    </div>
</div>


<div class="form-group row">
    <label for="licencia" class="col-lg-3 col-form-label">Licencia</label>
    <div class="col-lg-5">
        <input type="file" name="foto_up_licencia" id="licencia" data-initial-preview="{{isset($gondola->licencia) ? Storage::url("imagenes/gondolas/$gondola->licencia") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Documentos+LICENCIA"}}" accept="image/*"/>
    </div>
</div>

<div class="form-group row">
    <label for="seguro" class="col-lg-3 col-form-label">Seguro</label>
    <div class="col-lg-5">
        <input type="file" name="foto_up_seguro" id="seguro" data-initial-preview="{{isset($gondola->seguro) ? Storage::url("imagenes/gondolas/$gondola->seguro") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Documentos+SEGURO"}}" accept="image/*"/>
    </div>
</div>