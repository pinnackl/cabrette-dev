@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="row" style="max-width: 1200px;margin: auto;">
        <ul>
            @foreach($announces as $announce)
                <li>
                    <a href="{{ route('courses.show', [$announce]) }}">{{ $announce->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@stop
