<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursUpdateRequest extends FormRequest
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
            //
            'title' => 'sometimes|string|max:250',
            'description' => 'sometimes|string|max:500',
            'photo' => 'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'sometimes|numeric|max:500',
            'level' => 'sometimes|string|max:500',
            'categorie_id' => 'sometimes|nullable',
        ];
    }
}
