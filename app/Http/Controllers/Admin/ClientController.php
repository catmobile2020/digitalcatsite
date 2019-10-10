<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Requests\Admin\ClientRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $rows = Client::latest()->paginate(15);
        return view('admin.pages.client.index',compact('rows'));
    }

    public function create()
    {
        return view('admin.pages.client.create');
    }

    public function store(ClientRequest $request)
    {
        Client::create($request->all());
        return redirect()->route('admin.clients.index')->with('message','Operation Done Successfully');
    }

    public function show(Client $client)
    {
        $rows = $client->orders;
        return view('admin.pages.client.show',compact('client','rows'));
    }

    public function edit(Client $client)
    {
        return view('admin.pages.client.edit',compact('client'));
    }


    public function update(ClientRequest $request, Client $client)
    {
        $inputs = $request->all();
        $client->update($inputs);
        return redirect()->back()->with('message','Operation Done Successfully');
    }


    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->back();
    }
}
