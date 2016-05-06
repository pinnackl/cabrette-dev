@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Posts</li>
    </ol>

    <p>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary">
            <i class="fa fa-plus"></i> Nouveau post
        </a>
    </p>

    @include('partials.table', ['items' => $posts, 'resource' => 'posts', 'columns' => ['title', 'content', 'type', 'video_filename'], 'actions' => ['edit', 'destroy']])

@stop
