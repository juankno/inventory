<?php

namespace App\Http\Requests\Filters;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
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
            'sort_by' => 'sometimes|string|in:name,price,stock,created_at,updated_at',
            'sort_order' => 'sometimes|string|in:asc,desc',
            'category_id' => 'sometimes|integer|exists:categories,id',
            'name' => 'sometimes|string|max:255',
            'min_price' => 'sometimes|numeric|min:0',
            'max_price' => 'sometimes|numeric|min:0|gte:min_price',
            'min_stock' => 'sometimes|integer|min:0',
            'max_stock' => 'sometimes|integer|min:0|gte:min_stock',
        ];
    }
}
