<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
</head>

<body>
@foreach($data as $value)
<form action="{{route('edit.profile')}}" method="post" enctype="multipart/form-data">
    
<div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img height="100px" width="100px" class="rounded-circle mt-5" src="{{asset('storage/images/'.$value->image)}}" width="90"><span class="font-weight-bold">{{$value->fullname}}</span><span class="text-black-50">{{$value->email}}</span><span>{{$value->province}}</span></div>
                <p style="text-align: center; font-weight: bold;">Change Avatar</p>
                <input name="avatar" type="file" placeholder="Change Avatar" value="{{$value->image}}">
                <input type="hidden" name="current_avatar" value="{{$value->image}}">

            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            <a class="back" href="{{route('profile')}}"><h6 style="color:black;">Back to home</h6></a>
                        </div>
                        <h6 class="text-right">Edit Profile</h6>
                    </div>
                    @csrf
                    <div class="row mt-2">
                        <label class="col-md-6" style="padding: 0 15px;" for="name">Name</label>
                        <label class="col-md-6" style="padding: 0 15px;" for="fullname">Full Name</label>
                    </div>
                    <div class="row mt-2">
                        <input type="text" value="{{$value->name}}" name="name" placeholder="Name" class="col-md-6">
                        <input type="text" value="{{$value->fullname}}" name="fullname" placeholder="Full Name" class="col-md-6">
                    </div>
                    <div class="row mt-3">
                        <label class="col-md-6" style="padding: 0 15px;" for="email">Email</label>
                        <label class="col-md-6" style="padding: 0 15px;" for="phone">Phone Number</label>
                    </div>
                    <div class="row mt-3">
                        <input readonly type="text" value="{{$value->email}}" name="email" placeholder="Email" class="col-md-6">

                        <input type="text" value="{{$value->phone}}" name="phone" placeholder="Phone" class="col-md-6">
                    </div>
                    <div class="row mt-3">
                        <label class="col-md-6" style="padding: 0 15px;" for="address">Address</label>
                        <label class="col-md-6" style="padding: 0 15px;" for="province">Province</label>
                    </div>
                    <div class="row mt-3">
                        <input type="text" value="{{$value->address}}" name="address" placeholder="Address" class="col-md-6">

                        <input type="text" value="{{$value->province}}" name="province" placeholder="Province" class="col-md-6">
                    </div>
                    <div class="row mt-3">
                        <label class="col-md-6" style="padding: 0 15px;" for="district">District</label>
                        <label class="col-md-6" style="padding: 0 15px;" for="ward">Ward</label>
                    </div>
                    <div class="row mt-3">
                        <input type="text" value="{{$value->district}}" name="district" placeholder="District" class="col-md-6">

                        <input type="text" value="{{$value->ward}}" name="ward" placeholder="Ward" class="col-md-6">

                    </div>
                    <div class="row mt-3">
                        <label class="col-md-6" style="padding: 0 15px;" for="birthday">Birthday</label>
                    </div>
                    <div class="row mt-3">
                        <?php $date = date_create($value->birthday);?>
                        <input name="birthday" type="date" class="col-md-6" placeholder="Birthday" value="{{date_format($date,'Y-m-d')}}">
                    </div>
                    <div class="mt-5 text-right"><button class="btn btn-primary profile-button" name="submit" value="submit" type="submit">Save Profile</button></div>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
@endforeach

</html>