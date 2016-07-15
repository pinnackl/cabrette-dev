@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <legend>Créer une annonce</legend>
                {!! Form::model($announce, ['route' => ['annonces.update', $announce], 'method' => $announce->exist ? 'PUT' : 'POST', 'files' => true]) !!}
                {!! Form::bsText('title') !!}
                {!! Form::bsSelect('categories', $categories) !!}
                {!! Form::bsTextarea('content', null, ['style' => 'min-height:300px']) !!}
                {!! Form::bsButton('Enregistrer') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
