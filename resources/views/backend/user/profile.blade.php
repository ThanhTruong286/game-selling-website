<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/format.css') }}">
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
<div class="row">
<div class="profile-nav col-md-3">
<div class="panel">
<div class="user-heading round">
<a href="#">
<img src="{{ asset('storage/images/' . $user->image) }}" alt>
</a>
<h1>{{ $user->name }}</h1>
<P>{{ $user->email }}</P>
</div>
<ul class="nav nav-pills nav-stacked">
<li class="active"><a href="#"> <i class="fa fa-user"></i> Profile</a></li>
<li><a href="{{route('home')}}"> <i class="fa fa-home"></i> Back To Shop </a></li>
<li><a href="{{route('edit.profile.form')}}"> <i class="fa fa-edit"></i> Edit profile</a></li>
<li><a href="{{route('library',['user_id'=>$user->id])}}"> <i class="fa fa-gamepad"></i> Game Library</a></li>
</ul>
</div>
</div>
<div class="profile-info col-md-9">
<div class="panel">
<form>
<textarea placeholder="Whats in your mind today?" rows="2" class="form-control input-lg p-text-area"></textarea>
</form>
<footer class="panel-footer">
<button class="btn btn-warning pull-right">Post</button>
<ul class="nav nav-pills">
<li>
<a href="#"><i class="fa fa-map-marker"></i></a>
</li>
<li>
<a href="#"><i class="fa fa-camera"></i></a>
</li>
<li>
<a href="#"><i class=" fa fa-film"></i></a>
</li>
<li>
<a href="#"><i class="fa fa-microphone"></i></a>
</li>
</ul>
</footer>
</div>
<div class="panel">
<div class="bio-graph-heading">
{{ $user->description }}
</div>
<div class="panel-body bio-graph-info">
<h1>Bio Graph</h1>
<div class="row">
<div class="bio-row">
<p><span>Name </span>: {{ $user->name }}</p>
</div>
<div class="bio-row">
<p><span>Full Name </span>: {{$user->fullname}}</p>
</div>
<div class="bio-row">
<p><span>Province </span>: {{$user->province}}</p>
</div>
<div class="bio-row">
<p><span>Birthday</span>: {{ $user->birthday }}</p>
</div>
<div class="bio-row">
<p><span>Address </span>: {{$user->address}}</p>
</div>
<div class="bio-row">
<p><span>Ward </span>: {{$user->ward}}</p>
</div>
<div class="bio-row">
<p><span>District </span>: {{ $user->district }}</p>
</div>
<div class="bio-row">
<p><span>Phone </span>: {{ $user->phone}}</p>
</div>
</div>
</div>
</div>
<div>
<div class="row">
<div class="col-md-6">
<div class="panel">
<div class="panel-body">
<div class="bio-chart">
<div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="35" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(224, 107, 125); padding: 0px; -webkit-appearance: none; background: none;"></div>
</div>
<div class="bio-desk">
<h4 class="red">Envato Website</h4>
<p>Started : 15 July</p>
<p>Deadline : 15 August</p>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="panel">
<div class="panel-body">
<div class="bio-chart">
<div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="63" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; -webkit-appearance: none; background: none;"></div>
</div>
<div class="bio-desk">
<h4 class="terques">ThemeForest CMS </h4>
<p>Started : 15 July</p>
<p>Deadline : 15 August</p>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="panel">
<div class="panel-body">
<div class="bio-chart">
<div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="75" data-fgcolor="#96be4b" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(150, 190, 75); padding: 0px; -webkit-appearance: none; background: none;"></div>
</div>
<div class="bio-desk">
<h4 class="green">VectorLab Portfolio</h4>
<p>Started : 15 July</p>
<p>Deadline : 15 August</p>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="panel">
<div class="panel-body">
<div class="bio-chart">
<div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="50" data-fgcolor="#cba4db" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(203, 164, 219); padding: 0px; -webkit-appearance: none; background: none;"></div>
</div>
<div class="bio-desk">
<h4 class="purple">Adobe Muse Template</h4>
<p>Started : 15 July</p>
<p>Deadline : 15 August</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>