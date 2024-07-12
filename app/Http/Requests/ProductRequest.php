<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "name_product" => 'required',
            "price" => 'required|numeric',
            "quantity" => 'required|min:5|numeric',
            "quantity_min" => 'required|min:5|numeric',
            "image" => 'required|nullable|max:255',
            "description" => 'required|nullable|max:255',
        ];
    }
}
