@extends('layouts.admin.master')

@section('title','Product search list:')

@section('content')

<div class="container-fluid mt-3">
    <div class="row mx-1">
        <div class="col-md-4 px-2">
            <form class="m-0" method="POST" action="{{route('product-search')}}">
                @csrf
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Search:</span>
                    </div>
                    <input name='keyword' type="text" class="form-control" placeholder="keyword" aria-label="Product name" aria-describedby="basic-addon1" value="">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid product-list">
    <div class="row mx-1">
        @foreach ($product as $item)
        <div class="col-md-4 my-2 px-2 {{$item->id}}">
            <div class="row bg-white m-0 p-3">
                <div class="col-md-3 p-0 text-center">
                    <img class="img-fluid" src="{{$item->img}}" />
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
                            echo Str::substr(strip_tags($item->desc), 0, 150).'...';
                        @endphp
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="container-fluid">
    <div class="row mx-1 my-2">
        <div class="col-md-12">{{$product->links()}}</div>
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
