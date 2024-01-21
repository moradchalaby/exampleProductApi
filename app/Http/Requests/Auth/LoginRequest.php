<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public mixed $email;
    public mixed $name;
    public mixed $password;

    public function __construct()
    {
        $this->email = request()->email;
        if(request()->has('name')){
            $this->name = request()->name;
        }

        $this->password = request()->password;
    }
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
            'email' => 'required|email|string|min:3|max:255',
            'password' => 'required|string|min:3|max:255',
            'name' => 'nullable|string|min:3|max:255',
        ];
    }
}
