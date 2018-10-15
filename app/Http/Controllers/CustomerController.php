<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Model\City;
use App\Model\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $customers = Customer::paginate(5);
        $cities = City::all();
        return view('customer.listCustomer', compact('customers','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $cities = City::all();
        return view('customer.add', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $customers = new Customer();
        $customers->name     = $request->input('name');
        $customers->email    = $request->input('email');
        $customers->dob      = $request->input('dob');
        $customers->city_id  = $request->input('city_id');
        $customers->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới khách hàng thành công');
        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('customer_list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $customers = Customer::find($id);
        $cities = City::all();

        return view('customer.update', compact('customers', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $customers = Customer::find($id);
        $customers->name     = $request->input('name');
        $customers->email    = $request->input('email');
        $customers->dob      = $request->input('dob');
        $customers->city_id  = $request->input('city_id');
        $customers->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật khách hàng thành công');

        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('customer_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)

    {
        $customers = Customer::find($id);
        $customers->delete();
        return redirect()->route('customer_list');
    }

    public function filterByCity(Request $request){
        $idCity = $request->input('city_id');

        //kiem tra city co ton tai khong
        $cityFilter = City::find($idCity);

        //lay ra tat ca customer cua cityFiler

        $customers = Customer::where('city_id', $cityFilter->id)->paginate(5);
        $totalCustomerFilter = count($customers);
        $cities = City::all();

        return view('customer.listCustomer', compact('customers', 'cities', 'totalCustomerFilter', 'cityFilter'));
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        if(!$keyword){
            return redirect()->route('customer_list');
        }
        $customers = Customer::where('name', 'LIKE', '%' . $keyword . '%')

            ->paginate(5);


        $cities = City::all();

        return view('customer.listCustomer', compact('customers', 'cities'));


    }

}