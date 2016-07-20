@extends('layouts.admin')

@section('content')

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

@stop
