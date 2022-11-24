<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParqueRequest extends FormRequest
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
        $rules = [
            'parque' => 'required|max:255|unique:parques,parque,' . $this->id,
            'calle' => 'required|max:255',
            'municipio' => 'required|max:255',
            'codigo' => 'required|numeric',
        ];
        $messages = ['codigo.numeric' => 'El código postal debe ser un número.'];
        if (in_array($this->method(), ['POST'])) {
        }

        $rules = array_push($rules, $messages);
        return $rules;
    }
}
