@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Commentaires</li>
    </ol>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Conteni</th>
            <th>Statut</th>
            <th>Post associé</th>

        </tr>
        </thead>
        <tbody>
        @foreach($comments as $key => $comment)
            <tr>
                <td>{{ $key +1 }}</td>
                <td>{!! Markdown::convertToHtml($comment->content) !!}</td>
                <td>
                    @if($comment->state == true)
                        Non signalé
                    @elseif($comment->state == '')
                        Signalé
                    @endif
                </td>
                <td>@if($comment->post)<a href="{{ route('admin.posts.edit', [$comment->post]) }}">{{ $comment->post->title }}</a>@endif</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--@include('partials.table', ['items' => $comments, 'resource' => 'comments', 'columns' => ['content', 'state'], 'actions' => ['']])--}}

@stop
