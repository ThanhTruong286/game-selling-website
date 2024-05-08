<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Voucher</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/voucher.css')}}">
</head>
<body>
<section class="container">

<h1>Events</h1>
@foreach ($data as $value)

<div class="row">


<article class="card fl-left">
<section class="date">
<time datetime="23th feb">
<span>{{$value->type}}</span>
</time>
</section>
<section class="card-cont">
<small>Hopi Steam</small>
<h3>{{$value->content}}</h3>

<div class="even-date">
<i class="fa fa-calendar"></i>

<time>
<span>wednesday 28 december 2014</span>
<span>08:55pm to 12:00 am</span>
</time>
</div>
<!-- <div class="even-info">
<i class="fa fa-map-marker"></i>
<p>
nexen square for people australia, sydney
</p>
</div> -->
<a href="{{route('voucher',['id'=>$value->id])}}">Take</a>
</section>
</article>


</div>
@endforeach


</section>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>