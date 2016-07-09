@extends('layouts.public')

@section('content')

  @include('partials.navbar')

  <div class="container">

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

    <section class="content-home">
      <div class="event-block col-md-3 ">
        <h2>Event</h2>
      </div>

      <div class="right-block">
        <div class="col-md-4">
          <h2>Annonces</h2>
          <ul>
            @foreach($announces as $announce)
              <li>
                <a href="{{ route('announces.show', [$announce]) }}">{{ $announce->title }}</a>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="col-md-4">
          <h2>Cours</h2>
          <ul>
            @foreach($courses as $course)
              <li>
                <a href="{{ route('courses.show', [$course]) }}">{{ $course->title }}</a>
              </li>
            @endforeach
          </ul>
        </div>

        <div class="col-md-4">
          <h2>Forum</h2>
          <ul>
            @foreach($subjects as $subject)
              <li>
                <a href="#">{{ $subject->title }}</a>
              </li>
            @endforeach
          </ul>
        </div>

        <div class="col-md-4">
          <h2>Calendrier</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda cumque delectus doloremque, dolores eius, est in labore modi praesentium quas reiciendis saepe voluptate, voluptatem. Aut blanditiis consectetur fuga nihil repellendus.
          </p>
        </div>
      </div>
    </section>
  </div>
@stop
