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
                            <audio controls="controls" style="width: 100%">
                                Votre navigateur ne supporte pas l'élément <code>audio</code>.
                                <source src="{{ asset('uploads/'.$media->uploadFolder.'/'.$media->filename) }}" type="audio/mp3">
                            </audio>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@stop
