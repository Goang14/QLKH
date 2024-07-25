<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepairRequest extends FormRequest
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
            "name_customer" => 'required',
            "email" => 'required',
            "phone" => 'required',
            "address" => 'required',
            "type" => 'required',
            // "repair_content" => 'required',
            "start_guarantee" => 'required',
            "end_guarantee" => 'required',
        ];
    }
}
