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
