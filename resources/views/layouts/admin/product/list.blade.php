@extends('layouts.master')

@section('title','Product list')

@section('content')

<nav aria-label="Page breadcrumb">
    <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item active" aria-current="page">Trang chủ</li>
        <li class="breadcrumb-item">Danh sách sản phẩm</li>
    </ol>
</nav>

<table id="list-table">
    <tr>
      <th class="text-center">SKU</th>
      <th class="text-center">Product name</th>
      <th class="text-center">Cate</th>
      <th class="text-center">Price</th>
      <th class="text-center">Action</th>
    </tr>
    @foreach ($product as $item)
    <tr>
        <td class="fit text-center">{{$item->SKU}}</td>
        <td><img src="{{$item->img}}" height="70" width="70"> {{$item->name}}</td>
        <td class="fit text-center">{{$item->cateID}}</td>
        <td class="fit text-center">@php echo number_format($item->price,0,',','.'); @endphp</td>
        <td>
            <a href="#"><button type="button" class="btn btn-outline-primary">Edit</button></a>
            <button type="button" class="btn btn-outline-success">View</button>

            <button type="submit" class="delete" class="btn btn-outline-secondary">Delete</button>



        </td>
    </tr>
    @endforeach
    <tr aria-colspan="5">{{$product->links()}}</tr>
</table>
@endsection

<script>
    document
</script>
