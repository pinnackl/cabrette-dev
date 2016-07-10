@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    @include('partials.breadcrumb', ['link_item_principal' => 'announces' , 'item_principal'=> 'Annonces', 'item' => '' ])

    <div class="container">
        <section class="content-section">
            <div id='main'>
                <div id='posts-list'>
                    @foreach($announces as $announce)
                        <div class='post'>
                            <h3><a href="{{ route('announces.show', [$announce]) }}">{{ $announce->title }}</a></h3>
                            <p>source</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

@stop
