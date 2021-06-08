<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckMessage extends FormRequest {
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
            'content' => 'bail|required|between:5,2000',
            'login' => 'bail|required|size:3'
        ];
    }

    public function messages() {
        return [
            'content.required' => "Il faut renseigner un message pour l'envoyer !",
            'content.between' => "Votre message doit faire entre 5 et 2000 caractères.",
            'login.required' => "Une erreur est survenue, merci de vous reconnecter.",
            'login.between' => "Une erreur est survenue, merci de vous reconnecter."
        ];
    }
}
