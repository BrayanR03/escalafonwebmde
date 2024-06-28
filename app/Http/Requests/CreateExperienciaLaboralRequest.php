<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateExperienciaLaboralRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'FechaInicio'=>'required',
            'FechaFin'=>'required',
            'idCargo'=>'required|exists:cargos,idCargo',
            'idInstitucion'=>'required|exists:institucion,idInstitucion',
            'idTrabajador'=>'required'
        ];
    }

    public function messages(){
        return [
            'FechaInicio.required'=>'Debes seleccionar una Fecha de Inicio',
            'FechaFin.required'=>'Debes seleccionar una Fecha de Fin',
            'idCargo.required'=>'Necesitas seleccionar un Cargo',
            'idInstitucion.required'=>'Necesitas seleccionar una Institucion',
            'idTrabajador.required'=>'Necesitas un trabajador oara asignar una experiencia laboral'
        ];
    }
}
