@extends('master')
@section('title', 'This is list page')
@section('content')
    <div class="card">
        <div class="card-header">
            @if(Session::has('create_success'))
                <div class="alert-success"><p>{{Session::get('create_success')}}</p></div>
            @endif
            <div class="card-title"><h2> Danh sách đại lý phân phối</h2></div>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th>Mã số đại lý</th>
                    <th>Tên đại lý</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Tên người quản lý</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                @forelse($agencies as $agency)
                    <tr>
                        <td>{{ $agency->agent_code }}</td>
                        <td>{{ $agency->name }}</td>
                        <td>{{ $agency->phone }}</td>
                        <td>{{ $agency->email }}</td>
                        <td>{{ $agency->address }}</td>
                        <td>{{ $agency->manager }}</td>
                        @if($agency->status == 1)
                            <td>Ngừng hoạt động</td>
                        @else
                            <td>Hoạt động</td>
                        @endif
                        <td>
                            <button class="btn btn-warning mb-2">
                            <a href="{{ route('agencies.edit', $agency->id) }}">Sửa</a></button>
                            <form action="{{ route('agencies.destroy', $agency->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger mb-2" onclick="return confirm('Are you sure about that?')" type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>Not data</tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection
