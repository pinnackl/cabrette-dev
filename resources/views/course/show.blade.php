@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    @include('partials.breadcrumb', ['link_item_principal' => 'courses' , 'item_principal'=> 'Cours', 'item' => $course ])

    <div class="container">
        <section class="content-section">
            <div class="row">
                <h2>{{ $course->title }}</h2>

                <div class="col-md-11">
                    {!! Markdown::convertToHtml($course->content)  !!}
                </div>
            </div>
        </section>
    </div>
@stop
