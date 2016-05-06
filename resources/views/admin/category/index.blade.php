@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Categroies</li>
    </ol>

    <p>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-secondary">
            <i class="fa fa-plus"></i> Nouvelle catégorie
        </a>
    </p>

    @include('partials.table', ['items' => $categories, 'resource' => 'categories', 'columns' => ['title'], 'actions' => ['edit', 'destroy']])

@stop
