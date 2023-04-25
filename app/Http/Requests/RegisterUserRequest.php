<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class RegisterUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone_number' => ['required', 'unique:'.User::class],
            'gender_id' => ['required', Rule::exists('genders', 'id')],
            'department_id' => ['required', Rule::exists('departments', 'id')],
            'role_id' => ['required', Rule::exists('roles', 'id')],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
