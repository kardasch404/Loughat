<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'firstname' => 'sometimes|string|max:255',
            'lastname' => 'sometimes|string|max:255',
            'bio' => 'sometimes|string|max:2000',
            'phone' => 'sometimes',
            'photo' => 'sometimes|nullable|image|mimes:jpg,jpeg,png',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $this->route('id'),

        ];
    }
}
