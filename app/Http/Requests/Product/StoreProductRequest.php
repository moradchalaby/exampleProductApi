<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
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

            'name'=>'required | min:3 | max:255',
            'price'=>['required','numeric','min:0','regex:/^\d+(\.\d{1,2})?$/'], // 99999999999999999999.99
            'status'=>['required','boolean','in:0,1','numeric','min:0','max:1','regex:/^[0-1]$/'], // 0 or 1
            'type'=>'required | string | min:3 | max:255 | in:goods,services',

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
          'name.required' => 'Product name is required!',
            'name.min' => 'Product name must be at least 3 characters!',
            'name.max' => 'Product name must be less than 255 characters!',
            'price.required' => 'Product price is required!',
            'price.numeric' => 'Product price must be numeric!',
            'price.min' => 'Product price must be at least 0!',
            'price.regex' => 'Product price must be in format: 99.99!',
            'status.required' => 'Product status is required!',
            'status.boolean' => 'Product status must be boolean!',
            'status.in' => 'Product status must be 0 or 1!',
            'status.numeric' => 'Product status must be numeric!',
            'status.min' => 'Product status must be at least 0!',
            'status.max' => 'Product status must be at most 1!',
            'status.regex' => 'Product status must be in format: 0 or 1!',
            'type.required' => 'Product type is required!',
            'type.string' => 'Product type must be string!',
            'type.min' => 'Product type must be at least 3 characters!',
            'type.max' => 'Product type must be less than 255 characters!',
            'type.in' => 'Product type must be goods or services!',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'Product name',
            'price' => 'Product price',
            'status' => 'Product status',
            'type' => 'Product type',
        ];
    }

    /**
     * Get the default validation messages for the defined validation rules.
     */
    public function validationData(): array
    {

        return [
            'name' => $this->name,
            'price' => $this->price,
            'status' => $this->status,
            'type' => $this->type,
        ];
    }

}
