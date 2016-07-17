@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.medias.index') }}">Média</a></li>
        <li class="active">{{ $media->exists ? 'Modifier le media' : 'Nouveau media' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <legend>Modifier les informations</legend>
            {!! Form::model($media, ['route' => ['admin.medias.update', $media], 'method' => $media->exist ? 'PUT' : 'POST', 'files' => true]) !!}

                {!! Form::bsSelect('type', $types) !!}
                {!! Form::bsText('title') !!}

                {!! Form::file('file') !!}
                {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
