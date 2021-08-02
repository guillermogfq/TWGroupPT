<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'description' => [
                'required',
                'string',
                'min:3',
                'max:150'
            ],
            'max_date_execution' => [
                'required',
                'date'
            ],
            'user_assign_id' => [
                'required',
                'integer',
                'exists:users,id'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'description' => 'Descripción',
            'max_date_execution' => 'Fecha Máxima de Ejecución',
            'user_assign_id' => 'Usuario Asignado',
        ];
    }
}
