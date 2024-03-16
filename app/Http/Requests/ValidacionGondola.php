<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionGondola extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
            'placas_truck' => 'required',
            'placas_gondola1' => 'required',
            'conductor_names' => 'required|max:100',
            'conductor_apellidos' => 'required|max:100',
            'mt3' => 'required|numeric',
            'name_admin_flete' => 'required|max:100',
            'foto' => 'nullable|image|max:1024'
        ];
    }
    public function messages()
    {
        return [
            //'placas_truck.unique' => 'Ya existe una gondola con ese #PLACAS',
            'placas_truck.required'=> 'Ingresa un numero de  PLACAS',
            'placas_gondola1.required'=> 'Ingresa un numero de PLACAS',
            'conductor_names.required' => 'Ingresa el nombre del conductor',
            'conductor_apellidos.required' => 'Ingresa el apellido del conductor',
            'mt3.required' => 'Ingresa los mt3 de la gondola',
            'name_admin_flete.required' => 'Ingresa el nombre y apellidos del supervisor de la gondola',
            'foto_up.max' => 'La imagen del documento no puede tener un peso mayor a 1MB'
        ];
    }
}
