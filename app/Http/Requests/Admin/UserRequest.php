<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $data = [
            'name'=>'required',
            'country'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'role_id'=>'required',
            'pharmacy_id'=>'required',
            'status'=>'required',
         ];
        if ($this->routeIs('admin.users.update'))
        {
            $data['username']='required|unique:users,username,'.$this->user->id;
            $data['email']='required|unique:users,email,'.$this->user->id;
        }else
        {
            $data['username']='required|unique:users,username';
            $data['email']='required|unique:users,email';
            $data['password']='required|confirmed|min:6';
        }
        return $data;
    }
}
