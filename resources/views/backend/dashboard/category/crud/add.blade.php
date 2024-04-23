
<div class="wrapper wrapper-content animated fadeInRight ecommerce">


    <div class="row">
            <div class="col-lg-12">
                    <div class="tabs-container">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <!-- FORM -->
                                    <form action="{{ route('category.add') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="panel-body">
                                    <h2 style="padding-bottom:20px; text-align:center;"><strong>Add New Category</strong></h2>
                                        <fieldset class="form-horizontal">
                                            <div class="form-group"><label class="col-sm-2 control-label">Name:</label>
                                                <div class="col-sm-10"><input required name="name" type="text" class="form-control" placeholder="Category name"></div>
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


