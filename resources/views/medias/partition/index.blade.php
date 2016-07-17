@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <section class="content-section">
            <div id='main'>
                <div id='posts-list' style="padding-top: 10px">
                    @foreach($medias as $media)
                        <div class="blog-media">
                            <h2>{{ $media->title }}</h2>
                            <p class="summary"></p>
                            <a href="{{ asset('uploads/'.$media->uploadFolder.'/'.$media->filename) }}"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@stop
