<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $productId = $this->route('product');

        return [
            'name' => 'sometimes|string|max:255|unique:products,name,' . $productId,
            'description' => 'nullable|string',
            'price' => 'sometimes|numeric|min:0|max:999999.99',
            'stock' => 'sometimes|integer|min:0',
            'image' => 'nullable|string|max:500',
        ];
    }

    /**
     * Get custom error messages.
     */
    public function messages(): array
    {
        return [
            'name.unique' => 'Product name already exists',
            'price.numeric' => 'Price must be a number',
            'stock.integer' => 'Stock must be an integer',
        ];
    }
}
