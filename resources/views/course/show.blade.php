@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <section class="content-section">
        <div class="row">
            <h2>{{ $course->title }}</h2>

            <div class="col-md-11">
                {!! Markdown::convertToHtml($course->content)  !!}
            </div>
        </div>
    </section>
@stop
