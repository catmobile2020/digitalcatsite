<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Requests\Admin\OrderRequest;
use App\Order;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role_id == 2)
        {
            $users_id = $user->pharmacy->members()->pluck('id')->toArray();
        }else
        {
            $users_id=[$user->id];
        }
        $rows = Order::whereIn('user_id',$users_id)->latest()->paginate(15);
        return view('admin.pages.order.index',compact('rows'));
    }

    public function create()
    {
        $max_id = Order::max('id') ?:0;
        $order_number = '#'.($max_id+1);
        return view('admin.pages.order.create',compact('order_number'));
    }

    public function store(OrderRequest $request)
    {
        $client = Client::where('code',$request->client_code)->first();
        if (!$client)
        {
            return redirect()->back()->with('message','Client Code Wrong. Try Again!');
        }
        $inputs = $request->all();
        $inputs['client_id']=$client->id;
        $order_count = $client->orders()->count();
        if ($order_count and $order_count % 2)
        {
            $inputs['has_free']=true;
            $inputs['confirmation_code']=5050;
        }else
        {
            $inputs['activated']=true;
        }
        $user = auth()->user();
        $user->orders()->create($inputs);
        return redirect()->route('admin.orders.index')->with('message','Operation Done Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit(Order $order)
    {
        return view('admin.pages.order.edit',compact('order'));
    }


    public function update(OrderRequest $request, Order $order)
    {
        $inputs = $request->only('comment');
        if ($request->confirmation_code and $order->activated == false)
        {
            if ($request->confirmation_code == $order->confirmation_code)
            {
                $inputs['activated']=true;
            }else
            {
                return redirect()->back()->with('message','Confirmation Code Wrong. Try Again!');
            }
        }
        $order->update($inputs);
        return redirect()->back()->with('message','Operation Done Successfully');
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back();
    }
}
