<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'services' => 'required',
            'owner_id' => 'required',
            'car_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ids_services.required' => 'Se requiere al menos 1 servicio',
            'owner_id.required' => 'El propietario es requerido',
            'car_id.required' => 'El auto es requerido'
        ];
    }
}