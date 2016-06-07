@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="row" style="max-width: 1200px;margin: auto;">
        <ul>
            @foreach($courses as $course)
                <li>
                    <a href="{{ route('courses.show', [$course]) }}">{{ $course->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@stop
