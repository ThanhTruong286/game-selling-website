@extends('app')
@section('content')

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Our Shop</h3>
          <span class="breadcrumb"><a href="{{route('home')}}">Home</a> > Our Shop</span>
        </div>
      </div>
    </div>
  </div>

  @include($template)