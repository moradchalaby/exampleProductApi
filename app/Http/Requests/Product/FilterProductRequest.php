<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FilterProductRequest extends FormRequest
{



    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
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
            'name'=>'nullable | min:3 | max:255',
            'user_name'=>'nullable | min:3 | max:255',
            'user_email'=>'nullable | min:3 | max:255',
            'per_page'=>'nullable | integer | min:1 | max:100',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.min' => 'Product name must be at least 3 characters.',
            'name.max' => 'Product name must be at most 255 characters.',
            'user_name.min' => 'User name must be at least 3 characters.',
            'user_name.max' => 'User name must be at most 255 characters.',
            'user_email.min' => 'User email must be at least 3 characters.',
            'user_email.max' => 'User email must be at most 255 characters.',
            'per_page.min' => 'Per page must be at least 1.',
            'per_page.max' => 'Per page must be at most 100.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'Product Name',
            'user_name' => 'User Name',
            'user_email' => 'User Email',
            'per_page' => 'Per Page',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function filters(): array
    {
        return [
            'name'=>'trim|escape|strip_tags',
            'user_name'=>'trim|escape|strip_tags',
            'user_email'=>'trim|escape|strip_tags',
            'per_page'=>'trim|escape|strip_tags',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function validationData(): array
    {
       return [
            'name' => $this->name,
            'user_name' => $this->user_name,
            'user_email' => $this->user_email,
            'per_page' => $this->perPage,

        ];
    }

}
