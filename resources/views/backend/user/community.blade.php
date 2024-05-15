@extends('app')
@section('content')

<body>
    
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>People You May Know</h3>
          <span class="breadcrumb"><a href="#">Home</a>  >  People You May Know</span>
        </div>
      </div>
    </div>
  </div>
<br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        <div class="col">
            <div class="people-nearby">
              
            @foreach ($users as $user)
              <div class="nearby-user">
                <div class="row">
                  <div class="col-md-2 col-sm-2">
                    <img src="{{asset('storage/images/'.$user->image)}}" alt="user" class="profile-photo-lg">
                  </div>
                  <div class="col-md-7 col-sm-7">
                    <h5>{{$user->fullname}} A.K.A: <a href="#" class="profile-link">{{$user->name}} </a></h5>
                    <p>{{$user->description}}</p>
                    <p class="text-muted">{{$user->province}}</p>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <button onclick="window.location='{{route('add.friend',['friend_id'=>$user->id])}}'" class="btn btn-primary pull-right">Add Friend</button>
                  </div>
                </div>
              </div>
            @endforeach
            {{$users->appends(request()->except('page'))->links('pagination::bootstrap-5')}}
            </div>
    	</div>
	</div>
</div>

  </body>

