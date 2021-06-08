<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckConnection extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'login' => 'bail|required|size:3'
        ];
    }

    public function messages() {
        return [
            'login.required' => "Il faut renseigner un login pour accéder au chat !",
            'login.between' => "Votre login doit faire 3 caractères.",
        ];
    }
}
