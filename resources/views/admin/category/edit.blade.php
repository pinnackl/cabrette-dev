@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
        <li class="active">{{ $category->exists ? 'Modifier la catgéorie' : 'Nouvelle catégorie' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-6">
            <legend>Modifier les informations</legend>
            {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => $category->id ? 'PUT' : 'POST', 'files' => true]) !!}
                {!! Form::bsText('title') !!}
                {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
