@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <section class="content-section">
        <div class="row">
            <ul>
                @foreach($courses as $course)
                    <li>
                        <a href="{{ route('courses.show', [$course]) }}">{{ $course->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@stop
