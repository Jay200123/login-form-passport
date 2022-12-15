<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Storage;
use View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getCustomerAll(Request $request)
    {
        
        $customers = Customer::orderBy('id', 'ASC')->get();
        return response()->json($customers);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store function in RegisterController
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        $customer->fname = $request->fname;
        $customer->lname = $request->lname;
        $customer->address = $request->address;
        $customer->town = $request->town;
        $customer->city = $request->city;
        $customer->phone = $request->phone;

        $files = $request->file('uploads');

        $customer->customer_image = 'images/'. $files->getClientOriginalName();
        // $customer->update();
        $customer->save();

        Storage::put('public/images/'.$files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "Customer updated successfully.", "customer" => $customer, "status" => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return response()->json(["success" => "Customer Record Deleted Successfully.", "customer" => $customer, "status" =>200]);
    }
}
