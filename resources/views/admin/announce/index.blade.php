@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Annonces</li>
    </ol>

    <p>
        <a href="{{ route('admin.announces.create') }}" class="btn btn-secondary">
            <i class="fa fa-plus"></i> Nouvelle annonce
        </a>
    </p>

    @include('partials.table', ['items' => $announces, 'resource' => 'announces', 'columns' => ['title'], 'actions' => ['edit', 'destroy']])

@stop
