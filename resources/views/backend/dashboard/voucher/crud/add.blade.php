
<div class="wrapper wrapper-content animated fadeInRight ecommerce">


    <div class="row">
            <div class="col-lg-12">
                    <div class="tabs-container">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <!-- FORM -->
                                    <form action="{{ route('voucher.add') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="panel-body">
                                    <h2 style="padding-bottom:20px; text-align:center;"><strong>Add New Voucher</strong></h2>
                                        <fieldset class="form-horizontal">
                                            <div class="form-group"><label class="col-sm-2 control-label">Content:</label>
                                                <div class="col-sm-10"><input required name="content" type="text" class="form-control" placeholder="Content"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Value:</label>
                                                <div class="col-sm-10"><input required name="value" type="number" class="form-control" placeholder="Value"></div>
                                            </div>

                                            <div class="form-group"><label class="col-sm-2 control-label">Type:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="type" id="">
                                                        @foreach($type as $value)
                                                            <!-- phan cach id va name bang ky tu <>, name dung de tao slug -->
                                                            <option value="{{$value->id}}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
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


