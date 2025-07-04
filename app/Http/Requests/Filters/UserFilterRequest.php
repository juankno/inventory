<?php

namespace App\Http\Requests\Filters;

use App\Enums\UserRole;
use Illuminate\Foundation\Http\FormRequest;

class UserFilterRequest extends FormRequest
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
            'page' => 'sometimes|integer|min:1',
            'per_page' => 'sometimes|integer|min:1|max:100',
            'sort_by' => 'sometimes|string|in:name,email,created_at,updated_at',
            'sort_order' => 'sometimes|string|in:asc,desc',
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email',
            'role' => ['sometimes', 'in:' . implode(',', array_column(UserRole::cases(), 'value'))],
        ];
    }
}
