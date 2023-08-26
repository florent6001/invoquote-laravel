<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuotationRequest extends FormRequest
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
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'additionals_informations' => 'nullable|string',
            'state' => 'nullable|integer|in:0,1,2',
            'lines' => 'required|array|min:1', // Ensure at least one line is present
            'lines.*.name' => 'required|string|max:255',
            'lines.*.quantity' => 'required|integer|min:1',
            'lines.*.unit_price' => 'required|numeric|min:0',
        ];

        if (!$this->isMethod('put'))
        {
            $rules['customer_id'] = 'required|exists:customers,id';
        }

        return $rules;
    }
}
