<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoronaLocalStoreRequest extends FormRequest
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
            'corona_global_id' => 'required|numeric',
            'age' => 'required|numeric',
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'hospital_name' => 'required|string',
            'status' => 'required|string'
        ];
    }
}
