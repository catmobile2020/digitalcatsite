<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        $data= [
            'name'=>'required',
            'city'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'status'=>'required',
        ];
        if ($this->routeIs('admin.clients.update'))
        {
            $data['code']='required|unique:clients,code,'.$this->client->id;
            $data['email']='required|unique:clients,email,'.$this->client->id;
        }else
        {
            $data['code']='required|unique:clients,code';
            $data['email']='required|unique:clients,email';
        }
        return $data;
    }
}
