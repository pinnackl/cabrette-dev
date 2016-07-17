@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <section class="content-section" style="padding: 30px;padding-top: 20px;">
            <div class="row">
                <div style="background: #fff;border-radius: 3px;box-shadow: 0 3px 7px -3px rgba(0, 0, 0, 0.3);">
                    <h2 style="margin-bottom: 15px;">L'{{ $post->title }}</h2>
                    <p class="summary"></p>

                    <div class="col-md-12" style="background: #fff;border-radius: 3px;box-shadow: 0 3px 7px -3px rgba(0, 0, 0, 0.3);padding: 20px">
                        {!! Markdown::convertToHtml($post->content)  !!}
                    </div>
                </div>
            </div>
        </section>
    </div>

@stop
