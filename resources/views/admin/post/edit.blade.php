@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.posts.index') }}">Forum</a></li>
        <li class="active">{{ $post->exists ? 'Modifier le sujet' : 'Nouveau sujet' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <legend>Modifier les informations</legend>
            {!! Form::model($post, ['route' => $post->exists ? ['admin.posts.update', $post] : ['admin.posts.store'] , 'method' => $post->exists ?  'PUT' : 'POST ', 'files' => true]) !!}
                {!! Form::bsText('title') !!}
                {!! Form::bsSelect('theme', $themes) !!}
                {!! Form::bsTextarea('content') !!}
                 <label for="">Image de fond : </label>
                (taille: 1500 * 800 )
                {!! Form::file('cover') !!}
                {{ $post->cover_filename }}
                <br>
                {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
