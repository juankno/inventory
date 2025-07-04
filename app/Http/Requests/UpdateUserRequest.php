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
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $this->route('user') . '|max:255',
            'password' => 'sometimes|required|string|min:8|confirmed',
            'password_confirmation' => 'sometimes|required|string|min:8',
            'role' => 'sometimes|in:' . implode(',', array_column(\App\Enums\UserRole::cases(), 'value')),
        ];
    }
}
