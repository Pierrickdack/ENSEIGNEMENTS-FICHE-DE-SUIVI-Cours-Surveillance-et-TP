<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogDelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'matDel' => 'required|min:7|max:7',
            'mdpDel' => 'required|min:6|max:15',
        ];
    }

    public function messages(): array{
        return[
            'mdpDel.min' => 'Votre mot de passe est court',
            'mdpDel.max' => 'Votre mot de passe est long',

        ];
    }
}
