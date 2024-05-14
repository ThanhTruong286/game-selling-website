<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>Hopi Steam</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/templatemo-lugx-gaming.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/format.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->

</head>

<body>
  <style>
    @media (min-width: 1025px) {
      .h-custom {
        height: 100vh !important;
      }
    }
  </style>
  <form class="mt-4" method="get" action="{{ route('add.to.library') }}" enctype="application/x-www-form-urlencoded">
    @csrf
    <section class="h-100 h-custom" style="background-color: #eee;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col">
            <div class="card">
              <div class="card-body p-4">

                <div class="row">

                  <div class="col">
                    <h5 class="mb-3"><a href="{{route('category.home')}}" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                    <hr>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <div>
                        <p class="mb-1">Shopping cart</p>
                        <p style="font-weight:bold;" class="mb-0">You have {{$totalProduct}} items in your cart</p>
                      </div>
                      <div>
                        <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                              class="fas fa-angle-down mt-1"></i></a></p>
                      </div>
                    </div>
                    <!-- kiem tra gio hang -->
                    @if(!is_null($cart))
              @foreach($cart as $key => $value)
        <div class="card mb-3">
        <div class="card-body">
          <div class="d-flex justify-content-between">
          <div class="d-flex flex-row align-items-center">
          <div>
          <img src="{{asset('storage/images/' . $value['photo'])}}" class="" alt="Shopping item"
            style="width: 165px;height: 100px;border-radius:5px;">
          </div>
          <div class="ms-3">
          <h5>{{$value['name']}}</h5>
          <!-- <p class="small mb-0">{{$value['description']}}</p> -->
          <input name="product_id" type="hidden" value="{{$value['id']}}">
          </div>
          </div>
          <div class="d-flex flex-row align-items-center">
          <div style="width: 50px;">
          </div>
          <div style="width: auto; margin-right: 10px">
          <h5 class="mb-0">{{number_format($value['price'])}} VND</h5>
          </div>
          <a href="{{route('delete.cart', ['product_id' => $key])}}" style="color: red;"><i
            class="fas fa-trash-alt"></i></a>
          </div>
          </div>
        </div>
        </div>
      @endforeach
              <p style="color:dark;font-weight:bold;" class="mb-2">Voucher</p>
                @if($voucher!=null)
                <P>{{ $voucher[0] }}</P>
                <input name="voucher" type="hidden" value="{{$voucher[0]}}">
                @else
                <p>Không Sử Dụng</p>
                @endif
              <hr><p style="color:dark;font-weight:bold;" class="mb-2">Subtotal</p>
              <hr class="my-2">
              @if($voucher != null)
              <p style="color:dark;font-weight:bold;" class="mb-2">{{number_format($old_price)}} VND</p>
              @endif
              @if($voucher_type == 'VND')
              <p style="color:dark;font-weight:bold;" class="mb-2">- {{number_format($voucher_value)}} VND</p>
              @elseif($voucher_type == '%')
              <p style="color:dark;font-weight:bold;" class="mb-2">- {{number_format($voucher_value)}} % ({{number_format($voucher_value_price)}} VND)</p>
              @endif
              @if($voucher)
              <hr>
              @endif
              <p style="color:dark;font-weight:bold;" class="mb-2">{{number_format($totalPrice)}} VND</p>
              <input type="hidden" value="{{$totalPrice}}" name="amount">
              <button name="payUrl" type="submit" data-mdb-button-init data-mdb-ripple-init
              class="btn btn-info btn-block btn-lg">
              <div class="d-flex justify-content-between">
                <span style="color:white;">MoMo</span>
              </div>
              </button>
              <button name="payUrl" type="submit" data-mdb-button-init data-mdb-ripple-init
              class="btn btn-info btn-block btn-lg">
              <div class="d-flex justify-content-between">
                <span style="color:white;">VISA</span>
              </div>
              </button>
              <button type="button" data-mdb-button-init data-mdb-ripple-init
              class="btn btn-info btn-block btn-lg">
              <div class="d-flex justify-content-between">
                <a style="color:white;" href="#">GIFT</a>
              </div>
              </button>

            </div>
          @elseif(is_null($cart))
      <h5 class="mb-3">Bạn Chưa Có Sản Phẩm Nào Trong Giỏ</h5>
      <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-block btn-lg">
        <div class="d-flex justify-content-between">
        <span style="margin-left:10px;color:white;"> <a style="color:white;"
          href="{{route('category.home')}}">Mua Gì Đó</a></span>
        </div>
      </button>
    @endif  

          
    </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </form>

</body>

</html>
