@extends('layouts.master')

@section('title','Add/Edit product')

@section('content')
<form method="POST" action="{{route('products.store')}}">
    @csrf
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3 text-right">
                <button type="submit" class="btn btn-outline-success">Submit</button>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Name</span>
                    </div>
                    <input name='name' type="text" class="form-control" placeholder="Product name" aria-label="Product name" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Price</span>
                    </div>
                    <input name="price" type="text" class="form-control" placeholder="Product price" aria-label="Product price" aria-describedby="basic-addon1">
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
                    <input name="img" type="text" class="form-control" aria-describedby="basic-addon1" id="img" value="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Weight</span>
                    </div>
                    <input name='weight' type="text" class="form-control" placeholder="Product weight" aria-label="Product weight" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Unit</span>
                    </div>
                    <input name='unit' type="text" class="form-control" placeholder="Product unit" aria-label="Product unit" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    <img class="img-responsive img-rounded" id="view-img" src=""/>
                </div>
            </div>
            <div class="col-md-8">
                <textarea name='desc' id='desc'>

                </textarea>
            </div>
        </div>
    </div>
</form>

@endsection
