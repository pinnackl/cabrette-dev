@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.announces.index') }}">Annonces</a></li>
        <li class="active">{{ $announce->exists ? 'Modifier l annonce' : 'Nouvelle annonce' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <legend>Modifier les informations</legend>
            {!! Form::model($announce, ['route' => ['admin.announces.update', $announce], 'method' => $announce->id ? 'PUT' : 'POST', 'files' => true]) !!}
            {!! Form::bsText('title') !!}
            {!! Form::bsSelect('categories', $categories) !!}
            {!! Form::bsTextarea('content') !!}
            {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
