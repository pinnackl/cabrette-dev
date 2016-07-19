@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.courses.index') }}">Cours</a></li>
        <li class="active">{{ $course->exists ? 'Modifier le cours' : 'Nouveau cours' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <legend>Modifier les informations</legend>
            {!! Form::model($course, ['route' => ['admin.courses.update', $course], 'method' => $course->id ? 'PUT' : 'POST', 'files' => true]) !!}
            {!! Form::bsText('title', null, ['required']) !!}
            {!! Form::bsText('link_url', null, ['required']) !!}
            {!! Form::bsTextarea('content') !!}
            {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
