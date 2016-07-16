@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.themes.index') }}">Forum </a></li>
        <li class="active">{{ $theme->exists ? 'Modifier l annonce' : 'Nouvelle annonce' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <legend>Modifier les informations</legend>
            {!! Form::model($theme, ['route' => ['admin.themes.update', $theme], 'method' => $theme->id ? 'PUT' : 'POST', 'files' => true]) !!}
            {!! Form::bsText('title') !!}
            {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
