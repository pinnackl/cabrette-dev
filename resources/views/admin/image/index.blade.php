@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Homes images slider</li>
    </ol>

    <p>
        <a href="{{ route('admin.images.create') }}" class="btn btn-secondary">
            <i class="fa fa-plus"></i> Nouvelle image
        </a>
    </p>

    @include('partials.table', ['items' => $images, 'resource' => 'images', 'columns' => ['image_filename', 'order'], 'actions' => ['edit', 'destroy']])

@stop
