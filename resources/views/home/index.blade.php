@extends('layouts.public')

@section('content')

  @include('partials.navbar')

  <div class="container">

    <section class="content-slider">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @foreach($images as $key => $img)
            <li data-target="#carousel-example-generic" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
          @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
          @foreach($images as $key => $img)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
              <img src="{{ asset('uploads/images/'.$img->image_filename) }}" data-src="{{ asset('uploads/images/'.$img->image_filename) }}" alt="First slide">
            </div>
          @endforeach
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
        @if($event)
          <p>
            {{ $event->title  }}
          </p>
        @endif
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
                <a href="{{ url('forum/'.$subject->theme->id.'/subject/'.$subject->id) }}">{{ $subject->title }}</a>
              </li>
            @endforeach
          </ul>
        </div>

      </div>
    </section>
  </div>
@stop
