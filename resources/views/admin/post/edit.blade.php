@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.posts.index') }}">Forum</a></li>
        <li class="active">{{ $post->exists ? 'Modifier le sujet' : 'Nouveau sujet' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <legend>Modifier les informations</legend>
            {!! Form::model($post, ['route' => $post->exists ? ['admin.posts.update', $post] : ['admin.posts.store'] , 'method' => $post->id ?  'PUT' : 'POST ', 'files' => true]) !!}
                {!! Form::bsText('title') !!}
                {!! Form::bsText('link_url') !!}

                <div class="form-group" style="margin-left: 26%">
                    <label for="">Sans théme </label>
                    <input type="radio" name="type_theme" class="radio-theme" value="0" checked>
                    <label for="">Associé à un thème</label>
                    <input type="radio" name="type_theme" class="radio-theme"value="1">
                </div>
                <div class="form-group theme-select" style="display: none">
                    <label for="" style="width: 26%;display: inline-block">Thème</label>
                    {!! Form::select('theme', $themes,  null, ['class' => ' form-control', 'style' => 'width:73%;display:inline-block']) !!}
                </div>

                {!! Form::bsTextarea('content') !!}
                 <label for="" style="width: 25%">Image de fond : </label>

                {!! Form::file('cover') !!}
                {{ $post->cover_filename }}
                <br>
                {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
