
<div class="wrapper wrapper-content animated fadeInRight ecommerce">


    <div class="row">
            <div class="col-lg-12">
                    <div class="tabs-container">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <!-- FORM -->
                                    <form action="{{ route('product.edit') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="panel-body">
                                    <h2 style="padding-bottom:20px; text-align:center;"><strong>Edit Product</strong></h2>
                                        <fieldset class="form-horizontal">

                                            @foreach($product as $products)
                                            <div class="form-group"><label class="col-sm-2 control-label">ID:</label>
                                                <div class="col-sm-10"><input  name="id" type="text" class="form-control" placeholder="{{$products->id}}" value="{{ $products->id }}" readonly="true"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Name:</label>
                                                <div class="col-sm-10"><input  name="name" type="text" class="form-control" placeholder="{{$products->name}}" value="{{$products->name}}"></div>
                                            </div>
                                            
                                            <div class="form-group"><label class="col-sm-2 control-label">Price:</label>
                                                <div class="col-sm-10"><input id="old-price"  name="old-price" type="text" class="form-control" placeholder="{{$products->old_price}}" value = "{{$products->old_price}}"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Sale:</label>
                                                <div class="col-sm-10"><input id="sale" name="sale" type="text" class="form-control" placeholder="{{$products->sale}}"value="{{$products->sale}}"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">New Price:</label>
                                                <div class="col-sm-10"><input id="price"  name="price" type="text" class="form-control" placeholder="{{$products->price}}" value="{{$products->price}}" readonly="true">
                                                <button class="inputBox" id="cal" type="button">Calculate</button>
                                                
                                            </div>
                                                
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Description:</label>
                                                <div class="col-sm-10">
                                                    <input  name="description" type="text" class="form-control" placeholder="{{$products->description}}"value="{{$products->description}}">
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Special Product:</label>
                                                <div class="col-sm-10">
                                                    @if($products->banner)
                                                    True
                                                    <input checked  name="banner" type="radio" value="1">
                                                    False
                                                    <input  name="banner" type="radio" value="0">
                                                    @elseif(!$products->banner)
                                                    True
                                                    <input checked  name="banner" type="radio" value="1">
                                                    False
                                                    <input checked  name="banner" type="radio" value="0">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Category:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="category_id" id="">
                                                    <option value="{{ $products->category->id .'<>' . $products->category->name }}">{{ $products->category->name }}</option>

                                                        @foreach($category as $value)
                                                        
                                                            <!-- phan cach id va name bang ky tu <>, name dung de tao slug -->
                                                            <option value="{{ $value->id .'<>' . $value->name }}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Image:</label>
                                                <div class="col-sm-10">
                                                <img name="edit-image" src="{{asset('storage/images/'.$products->image)}}" alt="" width="200" height="100"><br><br>
                                                <input name="imageName" type="hidden" class="form-control" placeholder="{{$products->image}}"value="{{$products->image}}">

                                                <input accept="image/*"  value="{{$products->image}}"  name="image" type="file" class="form-control @error('title') is-invalid @enderror" placeholder="{{$products->image}}">
                                                    <!-- IF ERROR -->
                                                <button class="inputBox" id="cal" type="button"><a href="{{route('add.gallery.form',['product_id'=>$products->id])}}">Add Gallery</a></button>

                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    <!-- END IF -->
                                                </div>
                                                
                                            </div>
                                            
                                        </fieldset>
                                        @endforeach
        
                                        <div class="inputBox"> 

                                        <input type="submit" value="Submit"> 

                                        </div> 

                                    </div>
                                    
                                    </form>
                                    <!-- END FORM -->
                                </div>
                            </div>
                    </div>
            </div>
    </div>
</div>



