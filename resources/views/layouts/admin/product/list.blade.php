@extends('layouts.master')

@section('title','Product list')

@section('content')

<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-md-12 text-center page-header">Trang chủ - Sản phẩm</div>
        <div class="col-md-12 text-center page-desc">
            Hệ thống hiện tại có tất cả ??? sản phẩm...
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 px-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Search:</span>
                    </div>
                    <input id='search' type="text" class="form-control" placeholder="keyword" aria-label="Product name" aria-describedby="basic-addon1">
                </div>
        </div>
        <div class="col-md-4 px-2"> </div>
        <div class="col-md-4 px-2">{{$product->links()}}</div>
        <div class="search-result"></div>
    </div>
</div>

<div class="container-fluid product-list">
    <div class="row">
        @foreach ($product as $item)
        <div class="col-md-4 p-2">
            <div class="row bg-white m-0 p-3">
                <div class="col-md-3 p-0 text-center">
                    <img class="img-fluid" src="{{$item->img}}" />
                    <span class="font-weight-bold">{{$item->SKU}}</span><br />
                    <a href="{{route('products.edit',$item->id)}}">
                        <i class="fas fa-edit edit action-button" title="Edit this record!"></i>
                    </a>
                    <i class="fas fa-binoculars quick-view action-button" id-pro="{{$item->id}}" title="Quick view!"></i>
                    <i class="fas fa-trash-alt delete action-button" id="{{$item->id}}" link="{{route('products.destroy',$item->id)}}" title="Delete this record!"></i>
                </div>
                <div class="col-md-9 pr-0">
                    <div class="product-name"><a href="{{route('products.edit',$item->id)}}">{{$item->name}}</a></div>
                    <div>{{$item->cateID}}</div>
                    <div class="font-weight-bold">Giá: @php echo number_format($item->price,0,',','.'); @endphp</div>
                    <div>Active:
                        @php $active = ($item->active == 1)? 'Enabled' : 'Disabled';@endphp
                        <span class="ajax-active" field='active' value='{{$item->active}}' id-pro='{{$item->id}}'>{{$active}}</span>
                    </div>
                    <div>Feature:
                        @php $feature = ($item->feature == 1)? 'Enabled' : 'Disabled';@endphp
                        <span class="ajax-active" field='feature' value='{{$item->feature}}' id-pro='{{$item->id}}'>{{$feature}}</span>
                    </div>
                    <div class="font-italic">
                        @php
                        echo Str::substr($item->desc, 0, 150).'...';
                        @endphp
                    </div>
                </div>
            </div>
        </div>
        @endforeach
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
