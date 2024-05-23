<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedBackRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:16|regex:/^[\p{L}\s]{2,16}$/u',
            'email' => 'nullable|email',
            'phone' => 'required|regex:/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/',
            'agree' => 'required',
            'message' => 'min:2|max:255|required'
        ];
    }
}
