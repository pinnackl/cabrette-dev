@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Medias</li>
    </ol>

    <p>
        <a href="{{ route('admin.medias.create') }}" class="btn btn-secondary">
            <i class="fa fa-plus"></i> Nouveau Media
        </a>
    </p>

    @include('partials.table', ['items' => $medias, 'resource' => 'posts', 'columns' => ['title', 'type'], 'actions' => ['edit', 'destroy']])

@stop
