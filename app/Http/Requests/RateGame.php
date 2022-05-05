<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RateGame extends FormRequest
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
            'gameId'=> 'required|integer',
            'rate'=>'nullable|integer|min:1|max:100',

        ];
    }

    public function messages()
    {
        return [
            'rate.min' => 'Ocena musi być większa bądź równa :min',
            'rate.max'=> 'Ocena nie może być większa niż :max',
            'rate.integer'=> 'Przekazana wartość musi być liczbą całkowitą'
        ];
    }
}
