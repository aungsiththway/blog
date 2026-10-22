<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'phone' => ['required'],
            'profile' => ['required'],
            'profile' => ['nullable', 'image'],
            'email' => ['required'],
            'password' => ['required'],
            'password_confirmation' => ['required', 'same:password'],
            'role' => ['required', 'in:user,staff,admin'],
        ];
    }
}
