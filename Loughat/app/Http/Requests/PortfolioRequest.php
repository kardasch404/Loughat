<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
            'education.*.degree' => 'required|string|max:1000',
            'education.*.from' => 'required|numeric',
            'education.*.to' => 'required|numeric',
            'education.*.description' => 'required|string|max:1000',
            'experience.*.degree' => 'required|string|max:1000',
            'experience.*.from' => 'required|numeric',
            'experience.*.to' => 'required|numeric',
            'experience.*.description' => 'required|string|max:1000',
        ];
    }
}
