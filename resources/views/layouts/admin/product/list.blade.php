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
                <div class="col-md-1 align-self-center text-center">
                    {{$item->SKU}}
                </div>
                <div class="col-md-1 text-center"><img width="60" height="60" src="{{$item->img}}" /></div>
                <div class="col-md-3 align-self-center">
                    <a href="{{route('products.edit',$item->id)}}">{{$item->name}}</a>
                </div>
                <div class="col-md-2 align-self-center text-center">{{$item->cateID}} <span class="align-middle">middle</span></div>
                <div class="col-md-1 align-self-center text-center">@php echo number_format($item->price,0,',','.'); @endphp</div>
                <div class="col-md-1 align-self-center text-center">
                    @php $active = ($item->active == 1)? 'Enabled' : 'Disabled';@endphp
                    <span class="ajax-active" field='active' value='{{$item->active}}' id-pro='{{$item->id}}'>{{$active}}</span>
                </div>
                <div class="col-md-1 align-self-center text-center">
                    @php $feature = ($item->feature == 1)? 'Enabled' : 'Disabled';@endphp
                    <span class="ajax-active" field='feature' value='{{$item->feature}}' id-pro='{{$item->id}}'>{{$feature}}</span>
                </div>
                <div class="col-md-2 align-self-center text-center">
                    <a href="{{route('products.edit',$item->id)}}">
                        <i class="fas fa-edit edit action-button" title="Edit this record!"></i>
                    </a>
                    <i class="fas fa-binoculars quick-view action-button" id-pro="{{$item->id}}" title="Quick view!"></i>
                    <i class="fas fa-trash-alt delete action-button" id="{{$item->id}}" link="{{route('products.destroy',$item->id)}}" title="Delete this record!"></i>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col-md-3 offset-md-9">{{$product->links()}}</div>
            </div>

        </div>
    </div>
</div>






<!-- Modal -->
<div class="modal fade" id="QuickView" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
    </div>

  </div>
</div>
@endsection
