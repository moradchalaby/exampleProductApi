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
            'productName'=>'nullable | min:3 | max:255',
            'userName'=>'nullable | min:3 | max:255',
            'userEmail'=>'nullable | min:3 | max:255',
            'perPage'=>'nullable | integer | min:1 | max:100',
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
            'productName.min' => 'Product name must be at least 3 characters.',
            'productName.max' => 'Product name must be at most 255 characters.',
            'userName.min' => 'User name must be at least 3 characters.',
            'userName.max' => 'User name must be at most 255 characters.',
            'userEmail.min' => 'User email must be at least 3 characters.',
            'userEmail.max' => 'User email must be at most 255 characters.',
            'perPage.min' => 'Per page must be at least 1.',
            'perPage.max' => 'Per page must be at most 100.',
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
            'productName' => 'Product Name',
            'userName' => 'User Name',
            'userEmail' => 'User Email',
            'perPage' => 'Per Page',
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
            'productName'=>'trim|escape|strip_tags',
            'userName'=>'trim|escape|strip_tags',
            'userEmail'=>'trim|escape|strip_tags',
            'perPage'=>'trim|escape|strip_tags',
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
            'user_name' => $this->userName,
            'user_email' => $this->userEmail,
            'per_page' => $this->perPage,

        ];
    }

}
