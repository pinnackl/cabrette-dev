@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Forum</li>
    </ol>

    <p>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary">
            <i class="fa fa-plus"></i> Nouveau sujet
        </a>
    </p>

    @include('partials.table', ['items' => $subjects, 'resource' => 'posts', 'columns' => ['title'], 'actions' => ['edit', 'destroy']])
@stop
