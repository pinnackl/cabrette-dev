@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.courses.index') }}">Cours</a></li>
        <li class="active">{{ $course->exists ? 'Modifier le cours' : 'Nouveau cours' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-6">
            <legend>Modifier les informations</legend>
            {!! Form::model($course, ['route' => ['admin.courses.update', $course], 'method' => $course->exist ? 'PUT' : 'POST', 'files' => true]) !!}
            {!! Form::bsText('title') !!}
            {!! Form::bsTextarea('content') !!}
            {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
