@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.posts.index') }}">Posts</a></li>
        <li class="active">{{ $post->exists ? 'Modifier le post' : 'Nouveau post' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-6">
            {!! Form::model($post, ['route' => 'admin.posts.store', 'files' => true]) !!}
            {!! Form::bsText('title') !!}
            {!! Form::bsText('client') !!}
            {!! Form::bsText('agence') !!}
            {!! Form::bsText('realisateur') !!}
            {!! Form::bsText('compositeur') !!}
            {!! Form::bsText('groupe') !!}
            {!! Form::bsText('sound_design') !!}
            {!! Form::bsSelect('type', $types) !!}
            {!! Form::file('video') !!}
            <br>
            <label for="">Image de fond :</label>
            {!! Form::file('cover') !!}
            (taille: 1500 * 800 )
            <br>
            <label for="">Video de présentation</label>
            {!! Form::checkbox('first_video', true) !!}
            {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}

        </div>
    </div>

@stop
