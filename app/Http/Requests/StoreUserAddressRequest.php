<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAddressRequest extends FormRequest
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
            'address'    => 'required|string',
            'number'     => 'required|string',
            'complement' => 'string',
            'district'   => 'required|string',
            'zipcode'    => 'required|string'
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
            'address.required'    => 'O campo nome é obrigatório',
            'address.string'      => 'O campo nome deve ser em formato de texto',
            'number.required'     => 'O campo email é obrigatório',
            'number.string'       => 'O campo email deve ser em formato de texto',
            'complement.required' => 'O campo telefone é obrigatório',
            'complement.string'   => 'O campo telefone deve ser em formato de texto',
            'district.required'   => 'O campo bairro é obrigatório',
            'district.string'     => 'O campo bairro deve ser em formato de texto',
            'zipcode.required'    => 'O campo senha é obrigatório',
            'zipcode.string'      => 'O campo senha deve ser em formato de texto',
        ];
    }
}
