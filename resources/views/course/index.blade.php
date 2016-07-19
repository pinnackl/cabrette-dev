@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <section class="content-section">
            <div id='main'>
                <div id='posts-list' style="padding-top: 10px">
                    @foreach($courses as $course)
                        <div class="blog-card">
                            <div class="description" style="width: inherit">
                                <h1 style="font-size: 28px">{{ $course->title }}</h1>
                                <h2> <small>Publié le {{ $course->created_at->format('d/m/Y') }}</small></h2>
                                <p class="summary">{!! substr(Markdown::convertToHtml($course->content), 0 , 180)  !!} ...</p>
                                <a href="{{ url('cours/'.$course->link_url) }}"> Voir plus</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@stop
