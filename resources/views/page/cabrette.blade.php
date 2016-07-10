@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <section class="content-section" style="padding: 30px">
            <div class="row">
                <h2>La {{ $post->title }}</h2>

                <div class="col-md-11">
                    {!! Markdown::convertToHtml($post->content)  !!}
                </div>
            </div>
        </section>
    </div>

@stop
