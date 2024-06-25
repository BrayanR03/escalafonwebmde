<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEstudiosRequest extends FormRequest
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
            'Descripcion'=>'required',
            'idInstitucion'=>'required|exists:institucion,idInstitucion',
            'idNivelEstudios'=>'required|exists:nivelestudios,idNivelEstudios',
            'idTrabajador'=>'required'
        ];
    }

    public function messages(){
        return [
            'Descripcion.required'=>'Necesitas Ingresar Una descripcion del Estudio',
            'idInstitucion.required'=>'Necesitas Seleccionar una Institucion',
            'idNivelEstudios.required'=>'Necesitas Seleccionar un Nivel de Estudios',
            'idTrabajador.required'=>'Necesitas Un Trabajador para Asginar este Estudio'
        ];
    }
}
