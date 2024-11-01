<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\product;

class ReviewFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'string',
                'required',
                'max:255'
            ],
            'description' => [
            'required',
            'string',
            'max:255'
            ],
            'user_id' => [
                'required',
                'integer',
                'exists:users,id'
            ],
            'product_id' => [
                'required',
                'integer',
                'exists:products,id'
            ]
        ];
    }
}
