@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <section style="max-width: 1200px;margin: auto;">
        <div class="row">
            <h2>{{ $post->title }}</h2>

            <div class="col-md-11">
                {!! Markdown::convertToHtml($post->content)  !!}
            </div>
        </div>
    </section>

@stop
