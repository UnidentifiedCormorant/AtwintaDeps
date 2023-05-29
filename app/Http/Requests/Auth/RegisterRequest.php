<?php

namespace App\Http\Requests\Auth;

use App\Domain\Enum\Type;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required', //TODO: На правило валидации 'required|unique:users,email' срака которая insomnia выбрасывает 405 мол этот метод должен быть POST А ОН И ЕСТЬ БЛЯТЬ POST
            'password' => 'required',
            'type' => 'string',
            'github' => 'string',
            'city' => 'string',
            'phone' => 'string',
            'birthday' => 'string'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'fuck'
        ];
    }
}
