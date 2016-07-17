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
                            <video width="100%" controls="controls" preload="none">
                                <source src="{{ asset('uploads/'.$media->uploadFolder.'/'.$media->filename) }}"/>
                            </video>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@stop
