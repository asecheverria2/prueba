<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlantaPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'tratamiento_id' => [
                'required',
            ],
            'nombrecomun' => [
                'required',
            ],
            'nombrecientifico' => [
                'required',
            ],
            'familia' => [
                'required',
            ],
            'fechaingreso' => [
                'required',
            ],
            'descripcion' => [
                'required',
            ],
            'cantidad' => [
                'required',
            ],
        ];
    }
}
