<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        $roles = [
            'name' => 'required',
            'country' => 'required',
            'address' => 'required',
            'pharmacy_id' => 'required',
        ];

        if ($this->routeIs('api.account.update'))
        {
            $user = JWTAuth::authenticate();
            $roles +=['phone' => "required|unique:clients,phone,{$user->id}"];
            $roles +=['email' => "required|unique:clients,email,{$user->id}"];
        }

        if ($this->routeIs('api.register'))
        {
            $roles +=['phone' => "required|unique:clients,phone"];
            $roles +=['email' => "required|unique:clients,email"];
            $roles +=['password' => 'required|min:6'];
        }
        return  $roles;
    }

    protected function failedValidation(Validator $validator)
    {
        $result = ['status' => 'error' ,'data' => $validator->errors()->all()];

        throw new HttpResponseException(response()->json($result , 400));
    }
}
