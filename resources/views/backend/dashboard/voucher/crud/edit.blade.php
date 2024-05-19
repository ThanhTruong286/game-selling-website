<div class="wrapper wrapper-content animated fadeInRight ecommerce">


    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <!-- FORM -->
                        <form action="{{ route('voucher.edit') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="panel-body">
                                <h2 style="padding-bottom:20px; text-align:center;"><strong>Edit Voucher</strong></h2>
                                <fieldset class="form-horizontal">

                                    @foreach($voucher as $value)
                                            <div class="form-group"><label class="col-sm-2 control-label">ID:</label>
                                                <div class="col-sm-10"><input name="id" type="text" class="form-control"
                                                        placeholder="{{$value->id}}" value="{{ $value->id }}" readonly="true">
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Name:</label>
                                                <div class="col-sm-10"><input name="content" type="text" class="form-control"
                                                        placeholder="{{$value->content}}" value="{{$value->content}}"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Value:</label>
                                                <div class="col-sm-10"><input name="giaTri" type="text" class="form-control"
                                                        placeholder="{{$value->value}}" value="{{$value->value}}"></div>
                                            </div>

                                                <div class="form-group"><label class="col-sm-2 control-label">Type:</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="type" id="">
                                            @foreach ($type as $values)

                                                            <!-- phan cach id va name bang ky tu <>, name dung de tao slug -->
                                                            <option value="{{ $values->id . '<>' . $values->name }}">{{ $values->name }}</option>
                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>

                                            <div class="form-group"><label class="col-sm-2 control-label">Image:</label>
                                                <div class="col-sm-10">
                                                    <img name="edit-image" src="{{asset('storage/images/' . $value->image)}}"
                                                        alt="" width="200" height="100">
                                                    <input name="imageName" type="hidden" class="form-control"
                                                        placeholder="{{$value->image}}" value="{{$value->image}}">

                                                    <input accept="image/*" value="{{$value->image}}" name="image" type="file"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        placeholder="{{$value->image}}">
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