@extends('layouts.master')
@section('title', 'Danh sách tỉnh thành')

@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12" style="color: white; text-align: center">
                <h1>Danh Sách Tỉnh Thành</h1>
            </div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        {{ Session::get('success') }}
                    </p>
                @endif
            </div>
            <table class="table table-striped" style="color: white; text-align: center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên tỉnh thành</th>
                    <th scope="col">Số khách hàng</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($cities) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($cities as $key => $city)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $city->name }}</td>
                            <td>{{ count($city->customers) }}</td>
                            <td><a href="{{ route('cities_update', $city->id) }}">sửa</a></td>
                            <td><a href="{{ route('cities_delete', $city->id) }}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{ route('cities_addCity') }}">Thêm mới</a>
            <a class="btn btn-primary" href="{{route('home_list')}}">Back</a>
        </div>
        </div>
    </div>
@endsection