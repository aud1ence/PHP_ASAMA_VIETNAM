@extends('master')
@section('title', 'This is update page')
@section('content')
    <div class="card" style="width: 50%; margin-left: 30%">
        <div class="card-header">
            <div class="card-title"><h2>Thêm mới đại lý phân phối</h2></div>
            <form action="{{ route('agencies.update', $agency->id) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="form-group">
                        <label> Mã số đại lý </label>
                        <input type="text" name="id" value="{{ $agency->agent_code }}" class="form-control" aria-describedby="emailHelp">
                    </div>


                    <div class="form-group">
                        <label> Tên đại lý </label>
                        <input type="text" name="name" value="{{ $agency->name }}" class="form-control" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label> Điện thoại </label>
                        <input type="text" name="phone" value="{{ $agency->phone }}" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label> Email </label>
                        <input type="email" name="email" value="{{ $agency->email }}" class="form-control" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label> Địa chỉ đại lý </label>
                        <input type="text" name="address" value="{{ $agency->address }}" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label> Tên người quản lý </label>
                        <input type="text" name="manager" value="{{ $agency->manager }}" class="form-control" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label> Trạng thái </label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">

                            <option @if($agency->status === 1) selected @endif value="1">Ngừng hoạt động</option>
                            <option @if($agency->status === 0) selected @endif value="0">Hoạt động</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-left: 10%; margin-top: 5%; ">
                        <button type="submit" style="width: 100px" class="btn btn-primary mb-2">Thay đổi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

