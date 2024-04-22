

  <div class="section trending">
    <div class="container">
      <ul class="trending-filter">
        <li><a href="{{route('category.home')}}">Show All</a></li>
        <!-- duyet data category -->
        @foreach($categories as $value)
        <li>
        <a href="{{route('category.home',['name' => $value->slug])}}">{{$value->name}}</a>
        </li>
        @endforeach

      </ul>

      <div class="row trending-box">
        @if($count == 0)
          <h4 style="text-align: center;">Nothing To Show</h4>
        @endif
        @foreach($product as $value)

        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
          <div class="item">
            <div class="thumb">
              @if($value->sale > 0)
              <span class="product-offer">
                <p>{{ $value->sale }}%</p>
              </span>
              @endif
              <a href="{{ route('product.detail',['product_id'=>$value->id]) }}"><img height="200px" src="{{asset('storage/images/'.$value->image)}}" alt=""></a>
              <span class="price">                @if($value->sale > 0)
                <em>${{ number_format($value->old_price) }}</em>
                
                @endif
                @if($value->price > 0)
                ${{ $value->price }}</span>
                @else
                {{ 'Free' }}</span>
                @endif
              </span>
            </div>
            <div class="down-content">
              <span class="category">{{$value->category->name}}</span>
              <h4>{{$value->name}}</h4>
              <a href="{{route('add.to.cart',['product_id' => $value->id,'qty'=>$qty])}}">Buy</a>
            </div>
          </div>
        </div>

        @endforeach
        {{ $product->links('pagination::semantic-ui', ['foo' => 'bar']) }}

    </div>
  </div>