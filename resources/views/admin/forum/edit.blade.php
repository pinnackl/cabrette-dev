@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.forums.index') }}">Forum </a></li>
        <li class="active">{{ $announce->exists ? 'Modifier l annonce' : 'Nouvelle annonce' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-6">
            <legend>Modifier les informations</legend>
            {!! Form::model($announce, ['route' => ['admin.announces.update', $announce], 'method' => $announce->exist ? 'PUT' : 'POST', 'files' => true]) !!}
            {!! Form::bsText('title') !!}
            {!! Form::bsTextarea('content') !!}
            {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
