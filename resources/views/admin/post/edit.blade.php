@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.posts.index') }}">Posts</a></li>
        <li class="active">{{ $post->exists ? 'Modifier le poste' : 'Nouveau post' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-6">
            <legend>Modifier les informations</legend>
            {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'method' => 'PUT', 'files' => true]) !!}
                {!! Form::bsText('title') !!}
                {!! Form::bsText('client') !!}
                {!! Form::bsText('agence') !!}
                {!! Form::bsText('realisateur') !!}
                {!! Form::bsText('compositeur') !!}
                {!! Form::bsText('groupe') !!}
                {!! Form::bsText('sound_design') !!}
                {!! Form::bsSelect('type', $types) !!}
                <label for="">Video : </label>
                {!! Form::file('video') !!}
                {{ $post->video_filename }}
                <br>
                 <label for="">Image de fond : </label>
                (taille: 1500 * 800 )
                {!! Form::file('cover') !!}
                {{ $post->cover_filename }}
                    <br>
                <label for="">Video de présentation</label>
                {!! Form::checkbox('first_video', true) !!}
                {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
