@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Forum</li>
    </ol>

    <p>
        <a href="{{ route('admin.themes.create') }}" class="btn btn-secondary">
            <i class="fa fa-plus"></i> Nouveau theme
        </a>
    </p>

    @include('partials.table', ['items' => $themes, 'resource' => 'themes', 'columns' => ['title'], 'actions' => ['edit', 'destroy']])
@stop
