@extends('layouts.master')

@section('title','Edit product: '.$product->name)
@section('keywords',$product->seoKeyword)
@section('description',$product->seoDesc)

@section('content')
<form name="create" method="POST" action="{{route('products.update', $product->id)}}">
    @method('PUT')
    @csrf
    <div class="container-fluid">
        <div class="row" name="row-create">
            <div class="col-md-6 mb-3 text-left">
                <span>Edit product: {{$product->name}}</span>
            </div>
            <div class="col-md-6 mb-3 text-right">
                <button name="submit" value="apply" type="submit" class="btn btn btn-success btn-sm">Apply data</button>
                <button name="submit" value="save" type="submit" class="btn btn btn-primary btn-sm">Save and exit</button>
                <a href="{{route('products.index')}}" class="btn btn-secondary btn-sm exit" role="button">Exit</a>
            </div>
            <input type="text" class="datetime">
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Name</span>
                    </div>
                    <input value="{{$product->name}}" name='name' type="text" class="form-control" placeholder="Product name" aria-label="Product name" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Price</span>
                    </div>
                    <input value="{{number_format($product->price,0,',','.')}}" name="price" type="text" class="form-control" placeholder="Product price" aria-label="Product price" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Cate</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <a data-fancybox data-type="iframe" data-src="{{ url('plugins/filemanager/dialog.php?type=1&field_id=img') }}" href="javascript:;">
                            <span class="input-group-text" id="basic-addon1">Image</span>
                        </a>
                    </div>
                    <input value="{{$product->img}}" name="img" type="text" class="form-control" aria-describedby="basic-addon1" id="img" value="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Weight</span>
                    </div>
                    <input value="{{$product->weight}}" name='weight' type="text" class="form-control" placeholder="Product weight" aria-label="Product weight" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Unit</span>
                    </div>
                    <input value="{{$product->unit}}" name='unit' type="text" class="form-control" placeholder="Product unit" aria-label="Product unit" aria-describedby="basic-addon1">
                </div>
            </div>

            @php
            $active = $deactive = null;
            if($product->active == 1):
                $active = 'selected';
            else:
                $deactive = 'selected';
            endif
            @endphp
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Status</label>
                    </div>
                    <select name="active" class="custom-select" id="inputGroupSelect01">
                      <option {{$active}} value="1">Active</option>
                      <option {{$deactive}} value="0">Deactive</option>
                    </select>
                  </div>
            </div>
            @php
            $active = $deactive = null;
            if($product->feature == 1):
                $active = 'selected';
            else:
                $deactive = 'selected';
            endif
            @endphp
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Feature</label>
                    </div>
                    <select name="feature" class="custom-select" id="inputGroupSelect01">
                      <option {{$active}} value="1">Active</option>
                      <option {{$deactive}} value="0">Deactive</option>
                    </select>
                  </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">SEO Kewords</span>
                    </div>
                    <input value="{{$product->seoKeyword}}" name='seoKeyword' type="text" class="form-control" placeholder="SEO Kewords" aria-label="SEO Kewords" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">SEO Title</span>
                    </div>
                    <input value="{{$product->seoTitle}}" name='seoTitle' type="text" class="form-control" placeholder="SEO Title" aria-label="SEO Title" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-8">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">SEO Desc</span>
                    </div>
                    <input value="{{$product->seoDesc}}" name='seoDesc' type="text" class="form-control" placeholder="SEO Decs" aria-label="SEO Desc" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <img class="img-responsive img-rounded" id="view-img" src="{{$product->img}}"/>
                </div>
            </div>
            <div class="col-md-8">
                <textarea name='desc' id='desc'>
                    {{$product->desc}}
                </textarea>
            </div>
        </div>
    </div>
</form>

@endsection
