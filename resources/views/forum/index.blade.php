@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container" style="padding-top: 10px">
        @foreach($posts as $post)
            <div class="blog-card">
                <div class="photo photo1"></div>
                <ul class="details">
                    <li class="author"><a href="#">{{ $post->user->full_name }}</a></li>
                    <li class="date">{{ $post->created_at->format('d/m/Y à h:i') }}</li>
                    <li class="tags">
                        <ul>
                            <li><a href="#">Learn</a></li>
                            <li><a href="#">Code</a></li>
                            <li><a href="#">HTML</a></li>
                            <li><a href="#">CSS</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="description">
                    <h1>{{ $post->title }}</h1>
                    <p class="summary">{!! substr(Markdown::convertToHtml($post->content), 0 , 200)  !!} ...</p>
                    <a href="{{ url('forum/'.$post->theme->id.'/subject/'.$post->id) }}">Lire plus</a>
                </div>
            </div>
        @endforeach
    </div>
@stop
