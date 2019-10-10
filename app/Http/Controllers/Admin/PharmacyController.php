<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PharmacyRequest;
use App\Pharmacy;
use App\Http\Controllers\Controller;

class PharmacyController extends Controller
{
    public function __construct()
    {
        $this->middleware('not_pharmacist');
    }

    public function index()
    {
        $rows = Pharmacy::latest()->paginate(15);
        return view('admin.pages.pharmacy.index',compact('rows'));
    }

    public function create()
    {
        return view('admin.pages.pharmacy.create');
    }

    public function store(PharmacyRequest $request)
    {
        Pharmacy::create($request->all());
        return redirect()->route('admin.pharmacies.index')->with('message','Operation Done Successfully');
    }

    public function show(Pharmacy $pharmacy)
    {
        $members = $pharmacy->members;
        $clients = $pharmacy->clients->groupBy(function ($q){
            return serialize([$q->client->code,$q->client->name]);
        });
//        dd($clients);
       return view('admin.pages.pharmacy.show',compact('pharmacy','members','clients'));
    }

    public function edit(Pharmacy $pharmacy)
    {
        return view('admin.pages.pharmacy.edit',compact('pharmacy'));
    }


    public function update(PharmacyRequest $request, Pharmacy $pharmacy)
    {
        $inputs = $request->all();
        $pharmacy->update($inputs);
        return redirect()->back()->with('message','Operation Done Successfully');
    }


    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();
        return redirect()->back();
    }

    public function pharmacists(Pharmacy $pharmacy)
    {
        $members = $pharmacy->members;
        return view('admin.pages.pharmacy.pharmacists',compact('pharmacy','members'));
    }
}
