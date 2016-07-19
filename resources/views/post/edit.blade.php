@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <legend>Créer un article</legend>
                {!! Form::model($post, ['route' => $post->exists ? ['posts.update', $post] : ['posts.store'] , 'method' => $post->exists ?  'PUT' : 'POST ', 'files' => true]) !!}
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
                {!! Form::bsTextarea('content', null, ['style' => 'min-height:260px']) !!}
                <div class="form-group">
                    <label for="" style="width: 25%;display: inline-block">Image de fond: </label>
                    {!! Form::file('cover', null, ['style' => 'width:70%;display:inline-block']) !!}
                    {{ $post->cover_filename }}
                </div>
                <br>
                {!! Form::bsButton('Enregistrer') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
