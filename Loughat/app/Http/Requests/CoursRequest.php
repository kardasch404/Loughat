<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursRequest extends FormRequest
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
            'title' => 'required|string|max:250',
            'description' => 'required|string|max:500',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric|max:500', 
            'categorie_id' => 'nullable',   
            'level' => 'required|string|max:500',
        ];
    }
}
