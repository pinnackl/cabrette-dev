@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    @include('partials.breadcrumb', ['link_item_principal' => 'themes' , 'item_principal'=> 'Theme Forum', 'item' => '' ])

    <div class="container">
        <section class="content-section">
            <div id='main'>
                <div id='posts-list'>
                    <div class='post'>
                        <h3>{{ $post->title }}</h3>
                        <p> {!! Markdown::convertToHtml($post->content)  !!}</p>
                    </div>
                </div>

                @if(Auth::user())
                    <div class="block-comment">
                        {!! Form::open(['route' => ['comments.store'] , 'method' => 'POST ']) !!}
                            {!! Form::hidden('post_id', $post->id) !!}
                            {!! Form::bsTextarea('content') !!}
                            {!! Form::bsButton('Enregistrer') !!}
                        {!! Form::close() !!}
                    </div>
                @endif

                <div>
                    @foreach($post->comments as $comment)
                        <p>{{ $comment->content }} <br>
                            <small>par {{ $comment->user->full_name }}</small>
                        </p>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

@stop
