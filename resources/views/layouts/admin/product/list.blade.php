@extends('layouts.master')

@section('title','Product list')

@section('content')

<nav aria-label="Page breadcrumb">
    <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item active" aria-current="page">Trang chủ</li>
        <li class="breadcrumb-item">Danh sách sản phẩm</li>
    </ol>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row border-bottom border-top bg-white header">
                <div class="col-md-1 text-center">SKU</div>
                <div class="col-md-1 text-center">Image</div>
                <div class="col-md-3 text-center">Product name</div>
                <div class="col-md-2 text-center">Cate</div>
                <div class="col-md-1 text-center">Price</div>
                <div class="col-md-1 text-center">Active</div>
                <div class="col-md-1 text-center">Feature</div>
                <div class="col-md-2 text-center">Action</div>
            </div>
            @php $bg = 1;  @endphp
            @foreach ($product as $item)
            @php $bg++; $color = ($bg %2 !=0)? '#FFF' : '#FBFBFB';  @endphp
            <div class="row {{$item->id}} border-bottom py-1" style="background-color: {{$color}};">
                <div class="col-md-1 align-self-center text-center">{{$item->SKU}}</div>
                <div class="col-md-1 text-center"><img width="60" height="60" src="{{$item->img}}" /></div>
                <div class="col-md-3 align-self-center">
                    <a href="{{route('products.edit',$item->id)}}">{{$item->name}}</a>
                </div>
                <div class="col-md-2 align-self-center text-center">{{$item->cateID}} <span class="align-middle">middle</span></div>
                <div class="col-md-1 align-self-center text-center">@php echo number_format($item->price,0,',','.'); @endphp</div>
                <div class="col-md-1 align-self-center text-center">
                    @php $active = ($item->active == 1)? 'Activated' : 'Deactivated';@endphp
                    <span class="ajax-active" value='{{$item->active}}' id-pro='{{$item->id}}'>{{$active}}</span>
                </div>
                <div class="col-md-1 align-self-center text-center">
                    <!-- Default switch -->
                    <div class="custom-control custom-switch">
                        @php $feature = ($item->feature == 1)? 'Featured' : 'Nope';@endphp
                        @php $checked = ($item->feature == 1)? 'checked' : NULL; @endphp
                        <input type="checkbox"  class="custom-control-input" id="feature-{{$item->id}}" value="{{$item->feature}}" {{$checked}}>
                            <label class="custom-control-label" for="customSwitches">
                            {{$feature}}
                            </label>
                    </div>
                </div>
                <div class="col-md-2 align-self-center text-center">
                    <a class="btn btn-primary btn-sm" href="{{route('products.edit',$item->id)}}" role="button">Edit</a>
                    <button name="view" type="button" class="btn btn-success btn-sm">View</button>
                    <button name="delete" id="{{$item->id}}" link="{{route('products.destroy',$item->id)}}" type="button" class="btn btn-secondary btn-sm">Delete</button>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col-md-3 offset-md-9">{{$product->links()}}</div>
            </div>

        </div>
    </div>
</div>
@endsection
