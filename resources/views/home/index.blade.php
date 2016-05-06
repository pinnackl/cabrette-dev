@extends('layouts.public')

@section('content')

  @include('partials.navbar')

  <section class="content-slider">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img src="{{ asset('img/img1.JPG') }}" data-src="{{ asset('img/img1.JPG') }}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('img/img2.JPG') }}" data-src="{{ asset('img/img2.JPG') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('img/img3.JPG') }}"   data-src="{{ asset('img/img3.JPG') }}" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('img/img4.JPG') }}" data-src="{{ asset('img/img4.JPG') }}" alt="Fourth slide">
        </div>
      </div>
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="icon-prev" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="icon-next" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>
@stop
