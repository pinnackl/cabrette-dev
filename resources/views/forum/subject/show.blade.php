@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container" style="padding-top: 20px">
        <section class="content-section">
            <div class="blog-card" style="width: 100%;max-width: none; height: inherit">
                @if($post->cover_filename)
                    <div style="text-align: center;padding: 20px">
                        <img src="{{ asset('uploads/posts/'.$post->cover_filename) }}" alt="" style="width: 400px;height:200px;">
                    </div>
                @endif
                <div class="description" style="float: right;width: 100%">
                    <h1 style="font-size: 28px">{{ $post->title }}</h1>
                    <p class="summary">{!! Markdown::convertToHtml($post->content)  !!}</p>
                    <p class="block-author">
                        <small>Posté par {{ $post->user->full_name }} le {{ $post->created_at->format('d/m/Y à h:i') }}</small>
                    </p>
                </div>
            </div>

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
                    {!! Markdown::convertToHtml($comment->content) !!}
                    </p>
                    <small style="position:absolute;right: 5px;bottom: 5px;">Commenté {{ $comment->created_at->diffForHumans() }} par {{ $comment->user->full_name }}</small>
                </div>
            @endforeach

            @if(Auth::user())
                <div class="block-post-comment">
                    {!! Form::open(['route' => ['comments.store'] , 'method' => 'POST']) !!}
                        {!! Form::hidden('post_id', $post->id) !!}
                        {!! Form::bsTextarea('content') !!}
                        {!! Form::bsButton('Enregistrer') !!}
                    {!! Form::close() !!}
                </div>
            @endif

        </section>
    </div>

@stop
