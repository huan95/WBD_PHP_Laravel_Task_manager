@extends('layouts.master')
@section('title', 'Thêm mới khách hàng')
@section('content')
    <div class="col-12 col-md-12" style="color: white ">
        <div class="row">
            <div class="col-12">
                <h1 style="text-align: center">Thêm mới tỉnh thành</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('addCity')}}">
                    @csrf
                    <div class="form-group">
                        <label>Tên tỉnh</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection