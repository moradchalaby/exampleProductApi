<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProductRequest extends FormRequest
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
            'price'=>['nullable','numeric','min:0','regex:/^\d+(\.\d{1,2})?$/'], // 99999999999999999999.99
            'status'=>['nullable','boolean','in:0,1','numeric','min:0','max:1','regex:/^[0-1]$/'], // 0 or 1
            'type'=>'nullable | string | min:3 | max:255 | in:goods,services',

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
            'name.min' => 'Product name must be at least 3 characters!',
            'name.max' => 'Product name must be less than 255 characters!',
            'price.numeric' => 'Product price must be numeric!',
            'price.min' => 'Product price must be at least 0!',
            'price.regex' => 'Product price must be in format: 99.99!',
            'status.boolean' => 'Product status must be boolean!',
            'status.in' => 'Product status must be 0 or 1!',
            'status.numeric' => 'Product status must be numeric!',
            'status.min' => 'Product status must be at least 0!',
            'status.max' => 'Product status must be at most 1!',
            'status.regex' => 'Product status must be in format: 0 or 1!',
            'type.string' => 'Product type must be string!',
            'type.min' => 'Product type must be at least 3 characters!',
            'type.max' => 'Product type must be less than 255 characters!',
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
            'price' => 'Product Price',
            'status' => 'Product Status',
            'type' => 'Product Type',
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
            //
            'name'=>'trim|escape|strip_tags|cast:string',
            'price'=>'trim|escape|strip_tags|cast:float',
            'status'=>'trim|escape|strip_tags|cast:boolean',
            'type'=>'trim|escape|strip_tags|cast:string',
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
            //
            'name'=>$this->name,
            'price'=>$this->price,
            'status'=>$this->status,
            'type'=>$this->type,
        ];
    }

}
