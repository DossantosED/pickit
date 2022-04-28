<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'patent' => 'required',
            'colour' => 'required',
            'owner_id' => 'nullable|integer'
        ];
    }

    public function messages()
    {
        return [
            'brand.required' => 'La marca es requerida',
            'model.required' => 'El modelo es requerido',
            'year.required'  => mb_convert_encoding('El año es requerido','UTF-8', 'UTF-8'),
            'year.integer'  => mb_convert_encoding('El año es inválido','UTF-8', 'UTF-8'),
            'patent.required' => 'La patente es requerida',
            'colour.required' => 'El color es requerido',
            'owner_id.integer' => 'El id del propietario es inválido'
        ];
    }
}