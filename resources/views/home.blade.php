@extends('app')
@section('content')
<?php use App\Http\Controllers\Backend\AuthController;
?>


<!-- start Content  -->
  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
            <h6>Welcome to steam</h6>
            <h2>BEST GAMING SITE EVER!</h2>
            <p>Steam is the ultimate destination for playing, discussing, and creating games.</p>
            <div class="search-input">
              <form id="search" action="#">
                <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                <button role="button">Search Now</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 offset-lg-2">
          <div class="right-image">
            <img src="{{ asset('storage/images/re4.jpg') }}" alt="">
            <span class="price">$1</span>
            <span class="offer">-40%</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-01.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Free Storage</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-02.png" alt="" style="max-width: 44px;">
              </div>
              <h4>User More</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-03.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Reply Ready</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-04.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Easy Layout</h4>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Trending</h6>
            <h2>Trending Games</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="{{ route('shop.index') }}">View All</a>
          </div>
        </div>

        <!-- foreach product -->
        @foreach($products as $value)
        <div class="col-lg-3 col-md-6">
          <div class="item">
            
            <div class="thumb">
              <a href="{{ route('product.detail',['product_id'=>$value->id]) }}">
              @if($value->sale > 0)
              <span class="product-offer">
                <p>{{ $value->sale }}%</p>
              </span>
              @endif
              <img width="150px" height="200px" src="{{ asset('storage/images/' . $value->image) }}" alt="">
              </a>

            </div>
            <div class="down-content">
              <span class="category">{{ $value->category->name }}</span>
              <h4>{{ $value->name }}</h4>
              
              <br><br>
              <span class="price">
                @if($value->sale > 0)
                <em>${{ number_format($value->old_price) }}</em>
                
                @endif
                @if($value->price > 0)
                ${{ $value->price }}</span>
                @else
                {{ 'Free' }}</span>
                @endif
              <a class="edit-cart" href="{{route('add.to.cart',['product_id' => $value->id])}}">Buy</i></a>
            </div>
          </div>
        </div>
        @endforeach

        <!-- end of foreach -->
      </div>
    </div>
  </div>

  <div class="section most-played">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>TOP GAMES</h6>
            <h2>Most Played</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="shop.html">View All</a>
          </div>
        </div>
        @foreach($most_play as $value)
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img height="150px" src="{{ asset('storage/images/'.$value->image) }}" alt=""></a>
            </div>
            <div class="down-content">
                <span class="category">{{$value->category->name}}</span>
                <h4>{{ $value->name }}</h4>
                <a href="product-details.html">Explore</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="section categories">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Categories</h6>
            <h2>Top Categories</h2>
          </div>
        </div>

        <!-- show category list -->
        @foreach($categories as $value)
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>{{ $value->name }}</h4>
            <div class="thumb">
              <a href="product-details.html"><img height="300px" src="{{ asset('storage/images/' . $value->image) }}" alt=""></a>
            </div>
          </div>
        </div>
        @endforeach
        <!-- end of foreach -->


      </div>
    </div>
  </div>
  
  <div class="section cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="shop">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>Our Shop</h6>
                  <h2>Go Pre-Order Buy & Get Best <em>Prices</em> For You!</h2>
                </div>
                <p>Lorem ipsum dolor consectetur adipiscing, sed do eiusmod tempor incididunt.</p>
                <div class="main-button">
                  <a href="shop.html">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-2 align-self-end">
          <div class="subscribe">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>NEWSLETTER</h6>
                  <h2>Get Up To $100 Off Just Buy <em>Subscribe</em> Newsletter!</h2>
                </div>
                <div class="search-input">
                  <form id="subscribe" action="#">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your email...">
                    <button type="submit">Subscribe Now</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- end Content here -->