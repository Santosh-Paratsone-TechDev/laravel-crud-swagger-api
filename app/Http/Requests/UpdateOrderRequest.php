<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'user_id' => 'sometimes|integer|exists:users,id',
            'total_amount' => 'sometimes|numeric|min:0|max:999999.99',
            'status' => 'sometimes|string|in:pending,paid,shipped,delivered',
        ];
    }

    /**
     * Get custom error messages.
     */
    public function messages(): array
    {
        return [
            'user_id.exists' => 'User not found',
            'total_amount.numeric' => 'Total amount must be a number',
            'status.in' => 'Status must be one of: pending, paid, shipped, delivered',
        ];
    }
}
