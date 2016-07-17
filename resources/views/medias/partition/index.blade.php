@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <section class="content-section">
            <div id='main'>
                <h2 style="background: #fff;border-radius: 3px;box-shadow: 0 3px 7px -3px rgba(0, 0, 0, 0.3);margin-top: 20px;padding: 10px">Partitions</h2>
                <div id='posts-list' style="padding-top: 10px">
                    @foreach($medias as $media)
                        <div class="blog-media">
                            <h2>{{ $media->title }}</h2>
                            <p class="summary"></p>
                            <a href="{{ asset('uploads/'.$media->uploadFolder.'/'.$media->filename) }}" target="_blank">Voir la partition</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@stop
