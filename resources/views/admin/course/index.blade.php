@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Cours</li>
    </ol>

    <p>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-secondary">
            <i class="fa fa-plus"></i> Nouveau Cours
        </a>
    </p>

    @include('partials.table', ['items' => $courses, 'resource' => 'courses', 'columns' => ['title', 'link_url'], 'actions' => ['edit', 'destroy']])

@stop
