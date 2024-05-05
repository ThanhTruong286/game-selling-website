<h1 class="title">Add Gallery</h1>
@foreach($data as $value)
<form action="{{route('add.gallery')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="content">
    <div class="content">
        <h3>Product's Name: &nbsp; &nbsp; &nbsp; {{$value->name}}</h3>
        <input type="hidden" name="product_id" value="{{$value->id}}">
        <hr>
        @foreach($gallery as $galleries)
        <img height="100px" width="200px" src="{{asset('storage/images/'.$galleries->image)}}" alt="">
        @endforeach
        <hr>
        <input  name="gl1" type="file" class="form-control @error('title') is-invalid @enderror" placeholder="Choose image"><br>

        <div class="inputBox"> 
            <input type="submit" value="Submit"> 
        </div> 
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
</div>

</div>
</form>
@endforeach