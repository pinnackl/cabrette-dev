@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Events</li>
    </ol>

    <p>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary">
            <i class="fa fa-plus"></i> Nouvel évènement
        </a>
    </p>

    @include('partials.table', ['items' => $events, 'resource' => 'posts', 'columns' => ['title', 'content', 'date_start'], 'actions' => ['edit', 'destroy']])

@stop
