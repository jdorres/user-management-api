<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'      => 'string',
            'cpf'       => 'string|unique:users,cpf',
            'email'     => 'email|unique:users,email',
            'phone'     => 'string',
            'password'  => 'string'
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
            'cpf.unique'        => 'O campo cpf deve ser único',
            'email.required'    => 'O campo email é obrigatório',
            'email.unique'      => 'O campo email deve ser único',
            'email.string'      => 'O campo email deve ser em formato de texto',
            'phone.required'    => 'O campo telefone é obrigatório',
            'phone.string'      => 'O campo telefone deve ser em formato de texto',
            'password.required' => 'O campo senha é obrigatório',
            'password.string'   => 'O campo senha deve ser em formato de texto',
        ];
    }
}
