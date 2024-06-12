<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTrabajadoresRequest extends FormRequest
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
            'ApellidoPaterno'=>'required',
            'ApellidoMaterno'=>'required',
            'Nombres'=>'required',
            'Dni'=>'required',
            'Sexo'=>'required',
            'FechaNacimiento'=>'required',
            'idCondicionLaboral'=>'required|exists:condicionlaboral,idCondicionLaboral'
        ];
    }

    public function messages(){
        return [
            'ApellidoPaterno.required'=>'Necesitas Ingresar Un Apellido Paterno',
            'ApellidoMaterno.required'=>'Necesitas Ingresar Un Apellido Materno',
            'Nombres.required'=>'Necesitas Ingresar Un Nombre',
            'Dni.required'=>'Necesitas Ingresar Un Dni',
            'Sexo.required'=>'Necesitas Seleccionar el Sexo del Trabajador',
            'FechaNacimiento.required'=>'Necesitas Ingresar la Fecha de Nacimiento',
            'idCondicionLaboral.required' => 'Debe seleccionar una condición laboral.',
            'idCondicionLaboral.exists' => 'La condición laboral seleccionada no es válida.'
        ];
    }
}
