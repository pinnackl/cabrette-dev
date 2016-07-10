@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    @include('partials.breadcrumb', ['link_item_principal' => 'forum' , 'item_principal'=> 'Forum', 'item' => '' ])

    <div class="container">
        <section class="content-section">
            <div id='main'>
                <div id='posts-list'>
                    @foreach($themes as $theme)
                        <div class='post'>
                            <h3><a href="{{ route('forum.show', [$theme]) }}">{{ $theme->title }}</a></h3>
                            @if(count($theme->posts) > 0)
                                <ul>
                                    Sujets :
                                    @foreach($theme->posts as $post)
                                        <li> {{ $post->title }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@stop
