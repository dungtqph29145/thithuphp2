@extends('layout.main');
@section('content')
    {{-- @if(isset($_SESSION['errors'])&& isset($_GET['msg']))
    <ul>
        @foreach($_SESSION['errors'] as $error)
        <li style="color: red">{{$error}}</li>
        @endforeach
    </ul>
    @endif
    @if (isset($_SESSION['success'])&& isset($_GET['msg']))
    <span style="color:green">{{$_SESSION['success']}}</span>
    @endif --}}
    <form action="{{BASE_URL}}edit-product/{{$products->id}}" method="POST">
       <label for="">tên sản phẩm</label>
       <input type="text" name="ten_sp" value="{{$products->ten_sp}}">

       <label for="">giá sản phẩm</label>
       <input type="text" name="gia" value="{{$products->gia}}">

       <input type="submit" name="submit" value="Sửa">
    </form>
@endsection