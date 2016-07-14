@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    @include('partials.breadcrumb', ['link_item_principal' => 'themes' , 'item_principal'=> 'Theme Forum', 'item' => '' ])

    <div class="container">
        <section class="content-section">
            <div id='main'>
                <div id='posts-list'>
                    @foreach($theme->posts as $post)
                        <div class='post'>
                            <h3>{{ $post->title }}</h3>
                            <p> {!! substr(Markdown::convertToHtml($post->content), 0 , 400)  !!} ... <a href="{{ url('forum/'.$theme->id.'/subject/'.$post->id) }}">Voir plus</a></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

@stop
