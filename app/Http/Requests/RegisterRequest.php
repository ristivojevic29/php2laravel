<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "firstName"=>"required|regex:/^[A-Z][a-z]{2,14}/",
            "lastName"=>"required|regex:/^[A-Z][a-z]{2,14}/",
            "email"=>"required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/",
            "password"=>"required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{8,}$/",
            "repPassword"=>"required|same:password"
        ];
    }
    public function messages()
    {
        return [

        ];
    }
}
