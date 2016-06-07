@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <section style="max-width: 1200px;margin: auto;">
        <div class="row">
            <h2>{{ $announce->title }}</h2>

            <div class="col-md-11">
                {!! Markdown::convertToHtml($announce->content)  !!}
            </div>
        </div>
    </section>
@stop
