<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Wishlist</title>
    <link rel="stylesheet" href="{{asset('assets/css/wishlist.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


	<div class="cart-wrap">
		<div class="container">
	        <div class="row">
			    <div class="col-md-12">
                    <h5 class="mb-3"><a href="{{route('category.home')}}" class="text-body"><i
                        class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a>
                    </h5>
			        <div class="main-heading mb-10">My wishlist</div>
			        <div class="table-wishlist">
				        <table cellpadding="0" cellspacing="0" border="0" width="100%">
				        	<thead>
					        	<tr>
					        		<th width="35%">Product Name</th>
					        		<th width="15%">Old Price</th>
					        		<th width="15%">Sale</th>
					        		<th width="15%">Current Price</th>
								
					        		<th width="15%"></th>
					        		<th width="10%"></th>
					        	</tr>
					        </thead>
					        <tbody>
								@foreach ($data as $value)
							
					        	<tr>
					        		<td width="35%">
					        			<div class="display-flex align-center">
		                                    <div class="img-product">
		                                        <img src="{{asset('storage/images/'.$value->product->image)}}" alt="" class="mCS_img_loaded">
		                                    </div>
		                                    <div class="name-product">
		                                        {{$value->product->name}}
		                                    </div>
	                                    </div>
	                                </td>
					        		<td width="15%" class="price">{{number_format($value->product->old_price) }} VND</td>
					        		<td width="15%" class="price">{{number_format($value->product->sale)}} %</td>
					        		<td width="15%" class="price">{{number_format($value->product->price)}} VND</td>
          							<td><button class="round-black-btn small-btn" type="button" onclick="window.location='{{ route('add.to.cart',['product_id'=>$value->product->id]) }}'"><i class="fa fa-shopping-bag"></i> ADD TO CART</button></td>
          							<td><button class="round-red-btn small-btn" type="button" onclick="window.location='{{ route('delete.wishlist',['product_id'=>$value->product->id]) }}'"><i class="fa fa-shopping-bag"></i> DELETE</button></td>
					        	</tr>
								@endforeach
				        	</tbody>
				        </table>
				    </div>
			    </div>
			</div>
		</div>
	</div>
	
</body>
</html>