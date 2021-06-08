<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTodo extends FormRequest {
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
            'tache' => 'bail|required|between:3,255|alpha|unique:todos,name',
            'description' => 'bail|required|max:500|alpha'
        ];
    }

    public function messages() {
        return [
            'tache.required' => "Il faut renseigner une tâche et qu'elle soit unique !",
        ];
    }
}
