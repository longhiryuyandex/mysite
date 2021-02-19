<div class="container-fluid quick-view p-0 product-list">

            <div class="row bg-white m-0 p-0">
                <div class="col-md-3 p-0 text-center">
                    <img class="img-fluid mb-1" src="{{$product->img}}" />
                    <span class="font-weight-bold">{{$product->SKU}}</span>
                </div>
                <div class="col-md-9 pr-0">
                    <div class="product-name">
                        <a href="{{route('products.edit',$product->id)}}">{{$product->name}}</a>
                        <a href="{{route('products.edit',$product->id)}}">
                            <i class="fas fa-edit edit action-button" title="Edit this record!"></i>
                        </a>
                    </div>
                    <div>{{$product->cateID}}</div>
                    <div class="font-weight-bold">Giá: @php echo number_format($product->price,0,',','.'); @endphp</div>
                    <div>Active:
                        @php $active = ($product->active == 1)? 'Enabled' : 'Disabled';@endphp
                        <span class="ajax-active" field='active' value='{{$product->active}}' id-pro='{{$product->id}}'>{{$active}}</span>
                    </div>
                    <div>Feature:
                        @php $feature = ($product->feature == 1)? 'Enabled' : 'Disabled';@endphp
                        <span class="ajax-active" field='feature' value='{{$product->feature}}' id-pro='{{$product->id}}'>{{$feature}}</span>
                    </div>
                    <div>
                        <?php echo $product->desc; ?>
                    </div>
                </div>
            </div>

</div>
