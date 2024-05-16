
<div class="wrapper wrapper-content animated fadeInRight ecommerce">


    <div class="row">
            <div class="col-lg-12">
                    <div class="tabs-container">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <!-- FORM -->
                                    <form action="{{ route('product.add') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="panel-body">
                                    <h2 style="padding-bottom:20px; text-align:center;"><strong>Add New Product</strong></h2>
                                        <fieldset class="form-horizontal">
                                            <div class="form-group"><label class="col-sm-2 control-label">Name:</label>
                                                <div class="col-sm-10"><input required name="name" type="text" class="form-control" placeholder="Product name"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Price:</label>
                                                <div class="col-sm-10"><input required name="price" type="text" class="form-control" placeholder="$160.00"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Description:</label>
                                                <div class="col-sm-10">
                                                    <input required name="description" type="text" class="form-control" placeholder="Description">
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Category:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="category_id" id="">
                                                        @foreach($category as $value)
                                                            <!-- phan cach id va name bang ky tu <>, name dung de tao slug -->
                                                            <option value="{{ $value->id .'<>' . $value->name }}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Image:</label>
                                                <div class="col-sm-10">
                                                    <input required name="image" type="file" class="form-control @error('title') is-invalid @enderror" placeholder="Choose image">
                                                    <!-- IF ERROR -->
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
                                            <!--<div class="form-group"><label class="col-sm-2 control-label">Gallery:</label>
                                                <div class="col-sm-10">
                                                    <input required name="gl1" type="file" class="form-control @error('title') is-invalid @enderror" placeholder="Choose image"><br>
                                                    <input required name="gl2" type="file" class="form-control @error('title') is-invalid @enderror" placeholder="Choose image"><br>
                                                    <input required name="gl3" type="file" class="form-control @error('title') is-invalid @enderror" placeholder="Choose image"><br>
                                                    <input required name="gl4" type="file" class="form-control @error('title') is-invalid @enderror" placeholder="Choose image"><br>
                                                    <input required name="gl5" type="file" class="form-control @error('title') is-invalid @enderror" placeholder="Choose image"><br>
          
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                  
                                                </div>
                                            </div>-->
                                        </fieldset>
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


