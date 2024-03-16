<?php

namespace App\Models;


use App\Models\Seguridad\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flete extends Model
{
    protected $table = "flete";
    protected $fillable = ['usuario_id', 'gondola_id','origen','destino', 'fecha_salida', 'hora_salida', 'mina', 'km',  'fecha_pago','creado_por','status','fecha_llegada','hora_llegada','cliente','material','notas'];
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function gondola()
    {
        return $this->belongsTo(Gondola::class);
    }
}
