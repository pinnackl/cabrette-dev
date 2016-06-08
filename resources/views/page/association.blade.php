@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <section class="content-section">
        <div class="row">
            <h2>L'{{ $post->title }}</h2>

            <div class="col-md-11">
                {!! Markdown::convertToHtml($post->content)  !!}
            </div>
        </div>
    </section>

@stop