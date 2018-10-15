<?php

namespace App\Http\Controllers;

use App\Model\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    public function list()
    {
        $cities = City::all();
        return view('cities.list', compact('cities'));
    }

    public function delete($id)
    {
        $cities = City::find($id);
        $cities->customers()->delete();
        $cities->delete();

        Session::flash('success', 'Xóa  thành công');
        return redirect()->route('cities_list');
    }

    public function create()
    {
        return view('cities.addCity');
    }

    public function store(Request $request)
    {
        $cities = new City();
        $cities->name = $request->input('name');
        $cities->save();

        Session::flash('success', 'Tạo mới thành công');
        return redirect()->route('cities_list');
    }

    public function edit($id)
    {
        $cities = City::find($id);
        return view('cities.editCity', compact('cities'));
    }

    public function update(Request $request, $id){
        $cities = City::find($id);
        $cities->name = $request->input('name');
        $cities->save();
        return redirect()->route('cities_list');
    }
}
