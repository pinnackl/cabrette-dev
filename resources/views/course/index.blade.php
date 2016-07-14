@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <section class="content-section">
            <div id='main'>
                <div id='posts-list'>
                    @foreach($courses as $course)
                        <div class='post'>
                            <h3>{{ $course->title }}</h3>
                            <p>{!! substr(Markdown::convertToHtml($course->content), 0, 400 ) !!} ... <a href="{{ route('courses.show', [$course]) }}"> Voir plus</a></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@stop
