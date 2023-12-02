<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvenementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "libelle" => ['required', 'regex:/^[a-zA-Z ]+$/'],
            "date_limite_inscription" => ['required'],
            "description" => ['required'],
            "path_image" => ['required'],
            "est_cloture_ou_pas" => ['required', "regex:/^(cloture|pas cloture)$/"],
            "date_evenement" => ['date'],
        ];
    }
}
