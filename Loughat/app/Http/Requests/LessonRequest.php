<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            'section_id' => 'required|exists:sections,id',
            'cours_id' => 'required|exists:cours,id',
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:file,video',
            'duration' => 'required|string|max:50',
            'file_path' => 'required|string|max:255',
            'order' => 'required|integer|min:1',
        ];
    }
}
