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
                <div >
                    @foreach($post->comments()->orderBy('created_at', 'desc')->get() as $comment)
                        <div class="comment-block">
                            <div class="block-signal-comment">
                                {!! Form::open(['route' => ['comments.update', $comment] , 'method' => 'PUT']) !!}
                                    {!! Form::hidden('post_id', $post->id) !!}
                                    {!! Form::hidden('state', false) !!}
                                    <button type="submit" onClick="return confirm('Êtes-vous sûr de vouloir signaler ce commentaire ?');">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </button>
                                {!! Form::close() !!}
                            </div>
                            <p>
                                {{ $comment->content }}
                            </p>
                            <small style="position:absolute;right: 5px;bottom: 5px;">Commenté il y à {{ $comment->created_at->diffForHumans() }} par {{ $comment->user->full_name }}</small>
                        </div>
                    @endforeach
                </div>

                @if(Auth::user())
                    <div class="block-post-comment">
                        {!! Form::open(['route' => ['comments.store'] , 'method' => 'POST']) !!}
                            {!! Form::hidden('post_id', $post->id) !!}
                            {!! Form::bsTextarea('content') !!}
                            {!! Form::bsButton('Enregistrer') !!}
                        {!! Form::close() !!}
                    </div>
                @endif


            </div>
        </section>
    </div>

@stop
