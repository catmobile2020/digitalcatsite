<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
     return view('admin.pages.auth.login');   
    }

    public function login(LoginRequest $request)
    {
        $username = $request->username;
        $row = User::query()->where(function ($q) use ($username){
            $q->where('username',$username)->orWhere('email',$username);
        })->first();
        if ($row and (Hash::check($request->password,$row->password)))
        {
            auth()->login($row,$request->remember);
            return redirect()->intended('/');
        }
        return redirect()->back()->with('message','Error Your Credential is Wrong');
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        return redirect()->route('login');
    }
}
