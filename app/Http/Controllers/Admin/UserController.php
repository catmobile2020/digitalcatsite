<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserRequest;
use App\Pharmacy;
use App\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        $rows = User::where('role_id','!=',1)->latest()->paginate(15);
        return view('admin.pages.user.index',compact('rows'));
    }

    public function create()
    {
        $pharmacies = Pharmacy::all();
        return view('admin.pages.user.create',compact('pharmacies'));
    }

    public function store(UserRequest $request)
    {
        User::create($request->all());
        return redirect()->route('admin.users.index')->with('message','Operation Done Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $pharmacies = Pharmacy::all();
        return view('admin.pages.user.edit',compact('user','pharmacies'));
    }


    public function update(UserRequest $request, User $user)
    {
        $inputs = $request->all();
        if ($request->has('oldPassword') or $request->has('password'))
        {
            if (!Hash::check($request->oldPassword,$user->password))
            {
                return redirect()->back()->with('message','Old Password is Wrong');
            }
        }
        $user->update($inputs);
        return redirect()->back()->with('message','Operation Done Successfully');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
