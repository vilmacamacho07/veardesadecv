<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Gondola extends Model
{
    protected $table = "gondola";
    protected $fillable = ['placas_truck','placas_gondola1','placas_gondola2','tipo_transporte', 'conductor_names', 'conductor_apellidos', 'mt3','status', 'name_admin_flete', 'foto', 'licencia','seguro'];
 
    public function creado()
    {
        return $this->HasMany(Flete::class);
    }

    public static function setGondoladocs($foto, $actual = false)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("imagenes/gondolas/$actual");
            }
            $imageName = Str::random(20) . '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("imagenes/gondolas/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }
}
