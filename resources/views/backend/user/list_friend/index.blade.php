@extends('app')
@section('content')

<body>
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>List Friend</h3>
          <span class="breadcrumb"><a href="#">Home</a>  >  List Friend</span>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
  <div class="container">
    <div class="row">
        <div class="col">
            <div class="people-nearby">
              
            @foreach ($friends as $value)
            
              <div class="nearby-user">
                <div class="row">
                  <div class="col-md-2 col-sm-2">
                    <img src="{{asset('storage/images/'.$value->image)}}" alt="user" class="profile-photo-lg">
                  </div>
                  <div class="col-md-7 col-sm-7">
                    <h5><a href="#" class="profile-link">{{$value->name}}</a></h5>
                    <p>{{$value->description}}</p>
                    <p class="text-muted">{{$value->province}}</p>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <button class="btn btn-success pull-right"><a style="color:white;" href=""><i class="fa fa-comment"></i> Chat</a></button>
                    <button onclick="window.location='{{route('delete.friend',['friend_id'=>$value->id])}}'" class="btn btn-danger pull-right"><a style="color:white;" href=""><i class="fa fa-ban"></i> Delete</a></button>
                  </div>
                </div>
              </div>
            @endforeach

            {{$friends->appends(request()->except('page'))->links('pagination::default')}}


            </div>
    	</div>
	</div>
</div>
    </div>

</body>

