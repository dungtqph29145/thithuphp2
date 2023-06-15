@extends('layout.main')
@section('content')

<table border="1">
    <a href="{{BASE_URL}}add-product">Add</a>
    <thead>
        <th>ID</th>
        <th>Product name</th>
        <th>Giá</th>
        <th>Action</th>

    </thead>
    <tbody>
         @foreach($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->ten_sp }}</td>
                <td>{{ $p->gia }}</td>
                <th>
                    <a href="{{BASE_URL}}detail-product/{{$p->id}}">Sửa</a>
                    <a href="{{BASE_URL}}delete-product/{{$p->id}}" onclick="confirm('Ban co chac chan mua xoa khonng')">Xóa</a>
                </th>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
