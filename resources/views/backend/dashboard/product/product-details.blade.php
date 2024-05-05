@extends('app')
@section('content')

  <!-- duyet data bang foreach -->
  @foreach($data as $values)
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>{{ $values->name }}</h3>
          <span class="breadcrumb"><a href="{{ route('home') }}">Home</a>  >  <a href="{{route('category.home')}}">Our Shop</a>  >  {{ $values->name }}</span>
        </div>
      </div>
    </div>
  </div>
  

  <div class="single-product section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="{{ asset('storage/images/'.$values->image) }}" alt="">
            
          </div>

        </div>
        <div class="col-lg-6 align-self-center">

          <h4>{{$values->name}}</h4>
          @if($values->sale > 0)
                <p style="font-weight:bold;color:red; margin:15px 0px;font-size:large;"> SALE: {{ $values->sale }}%</p>
              @endif
          <span class="price">

          @if($values->sale > 0)
            <em>{{ number_format($values->old_price) }} VND</em>
          @endif
          @if($values->price > 0)
              {{ number_format($values->price) }} VND</span>
            @else
              {{ 'Free' }}
          @endif
          </span>

          <p>{{ $values->description }}</p>
          <form id="qty" action="#">
            @if($values->price == 0)
            <button type="button" onclick="window.location='{{ route('add.to.library',['product_id'=>$values->id]) }}'"><i class="fa fa-shopping-bag"></i> ADD TO LIBRARY</button>
            @elseif($values->price > 0)
            <button type="button" onclick="window.location='{{ route('add.to.cart',['product_id'=>$values->id]) }}'"><i class="fa fa-shopping-bag"></i> ADD TO CART</button>
            @endif
          </form>
          <ul>

            <li><span>Genre:</span> <a href="#">Action</a>, <a href="#">Team</a>, <a href="#">Single</a></li>
            <li><span>Multi-tags:</span> <a href="#">War</a>, <a href="#">Battle</a>, <a href="#">Royal</a></li>
          </ul>
        </div>
        <div class="col-lg-12">
        <!-- Nhan data tu ham product_detail ProductController -->
        @foreach($gallery as $value)
        <div class="responsive">
          <div class="gallery">
            <img src="{{asset('storage/images/'.$value->image)}}" alt="">
          </div>
        </div>
        @endforeach

          <div class="sep"></div>
        </div>
      </div>
    </div>
  </div>


  <div class="more-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews (3)</button>
                  </li>
                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                  <p>{{ $values->description }}</p>
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                  <p>Coloring book air plant shabby chic, crucifix normcore raclette cred swag artisan activated charcoal. PBR&B fanny pack pok pok gentrify truffaut kitsch helvetica jean shorts edison bulb poutine next level humblebrag la croix adaptogen. <br><br>Hashtag poke literally locavore, beard marfa kogi bruh artisan succulents seitan tonx waistcoat chambray taxidermy. Same cred meggings 3 wolf moon lomo irony cray hell of bitters asymmetrical gluten-free art party raw denim chillwave tousled try-hard succulents street art.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section categories related-games">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>{{ $values->Category->name }}</h6>
            <h2>Related Games</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="{{route('category.home',['name'=>$values->category->name])}}">View All</a>
          </div>
        </div>
        @foreach($data_related as $value)
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>{{$value->category->name}}</h4>
            <div class="thumb">
              <a href="{{route('product.detail',['product_id'=>$value->id])}}"><img height="150px" src="{{asset('storage/images/'.$value->image)}}" alt=""></a>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
  @endforeach
  <!-- endforeach -->
