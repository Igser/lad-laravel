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
            'name'  => ['required', 'string'],
            'age'   => ['numeric', 'nullable'],
            'file'  => ['required', 'file', 'mimes:jpg,png'],
            'email' => ['required', 'email:dns']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле Имя обязательно для заполнения',
            'age.required' => 'Поле Age обязательно для заполнения',
            'email.email' => 'Поле Email должно быть корректным email-адресом',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
        ];
    }
}
