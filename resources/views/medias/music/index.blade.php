@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <section class="content-section">
            <div id='main'>
                <h2 style="background: #fff;border-radius: 3px;box-shadow: 0 3px 7px -3px rgba(0, 0, 0, 0.3);margin-top: 20px;padding: 10px">Musiques</h2>
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
