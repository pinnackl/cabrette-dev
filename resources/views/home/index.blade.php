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
      <div class="event-block">
        <h2>Evénements</h2>
        @if($event)
          <p>
            {{ $event->title  }} <br>
            Dans {{ $event->date_start->diffForHumans(null, true) }}
          </p>
        @endif
      </div>

      <div class="first-block-content-home">
        <div class="block-announces-home">
          <h2>Annonces</h2>
          <ul>
            @foreach($announces as $announce)
              <li>
                <a href="{{ route('annonces.show', [$announce]) }}">{{ $announce->title }}</a>
              </li>
            @endforeach
          </ul>
          <a class="see-more" href="{{ route('annonces.index') }}"> Voir plus</a>
        </div>
        <div class="block-courses-home">
          <h2>Cours</h2>
          <ul>
            @foreach($courses as $course)
              <li>
                <a href="{{ url('cours/'.$course->link_url) }}">{{ $course->title }}</a>
              </li>
            @endforeach
          </ul>
          <a class="see-more" href="{{ route('cours.index') }}"> Voir plus</a>
        </div>
      </div>

        <div class="block-forum-home">
          <h2>Forum</h2>
          <ul>
            @foreach($subjects as $subject)
              <li>
                <a href="{{ url('forum/'.$subject->link_url) }}">{{ $subject->title }}</a>
              </li>
            @endforeach
          </ul>
          <a class="see-more" href="{{ route('forum.index') }}"> Voir plus</a>
        </div>


    </section>
  </div>
@stop
