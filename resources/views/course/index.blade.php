@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    @include('partials.breadcrumb', ['link_item_principal' => 'courses' , 'item_principal'=> 'Cours', 'item' => '' ])

    <div class="container">
        <section class="content-section">
            <div id='main'>
                <div id='posts-list'>
                    @foreach($courses as $course)
                        <div class='post'>
                            <h3><a href="{{ route('courses.show', [$course]) }}">{{ $course->title }}</a></h3>
                            <p>source</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@stop
