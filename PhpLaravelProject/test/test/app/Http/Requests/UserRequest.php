<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $method = $this->route()->getActionMethod();
        $rules = [
            'id' => 'int',
            'name' => 'required|string|min:2|max:16|regex:/^[\p{L}\s]{2,16}$/u',
            'email' => ['required', 'email', Rule::unique('usermodels', 'email')->ignore(request('id'))],
            'status' => 'nullable'
        ];
        if ($method !== 'update') {
            $rules['password'] = 'required|string|confirmed';
            $rules['password_confirmation'] = 'required|string';
        }
        else
        {
            $rules['password'] = 'nullable|string|confirmed';
            $rules['password_confirmation'] = 'nullable|string';
        }
        return $rules;
    }
}
