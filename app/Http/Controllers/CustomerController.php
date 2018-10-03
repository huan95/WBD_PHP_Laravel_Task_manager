<?php

namespace App\Http\Controllers;
use App\Model\Customer;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function list()
{
$customers = Customer::all();
return view('list', compact('customers'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('add');
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$customer = new Customer;
$customer->full_name = $request->input('full_name');
$customer->phone_number = $request->input('phone_number');
$customer->email = $request->input('email');
$customer->save();
return redirect()->route('customer_list');
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
//
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
$customer = Customer::find($id);
return view('update', compact('customer'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$customer = Customer::find($id);
$customer->full_name = $request->input('full_name');
$customer->phone_number = $request->input('phone_number');
$customer->email = $request->input('email');
$customer->save();
return redirect()->route('customer_list');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function delete($id)
{
$customer = Customer::find($id);
$customer->delete();
return redirect()->route('customer_list');
}
}