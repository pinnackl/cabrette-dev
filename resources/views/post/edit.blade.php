@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <legend>Créer un article</legend>
                {!! Form::model($post, ['route' => $post->exists ? ['posts.update', $post] : ['posts.store'] , 'method' => $post->exists ?  'PUT' : 'POST ', 'files' => true]) !!}
                {!! Form::bsText('title') !!}
                {!! Form::bsSelect('theme', $themes) !!}
                {!! Form::bsTextarea('content', null, ['style' => 'min-height:260px']) !!}
                <div class="form-group">
                    <label for="" style="width: 25%;display: inline-block">Image de fond (taille: 1500 * 800 ): </label>
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
