@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.themes.index') }}">Forum </a></li>
        <li class="active">{{ $theme->exists ? 'Modifier le thème' : 'Nouveau Thème' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <legend>Modifier les informations</legend>
            {!! Form::model($theme, ['route' => ['admin.themes.update', $theme], 'method' => $theme->id ? 'PUT' : 'POST', 'files' => true]) !!}
            {!! Form::bsText('title', null, ['required']) !!}
            {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
