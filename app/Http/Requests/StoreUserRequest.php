<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string',
            'cpf' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'password' => 'required|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required'     => 'O campo nome é obrigatório',
            'name.string'       => 'O campo nome deve ser em formato de texto',
            'cpf.required'      => 'O campo cpf é obrigatório',
            'cpf.string'        => 'O campo cpf deve ser em formato de texto',
            'email.required'    => 'O campo email é obrigatório',
            'email.string'      => 'O campo email deve ser em formato de texto',
            'phone.required'    => 'O campo telefone é obrigatório',
            'phone.string'      => 'O campo telefone deve ser em formato de texto',
            'password.required' => 'O campo senha é obrigatório',
            'password.string'   => 'O campo senha deve ser em formato de texto',
        ];
    }
}
