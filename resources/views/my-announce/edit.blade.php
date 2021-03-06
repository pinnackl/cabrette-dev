@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <legend> {{ $announce->id ? 'Modifier l\'annonce' : 'Créer une annonce' }}</legend>
                {!! Form::model($announce, ['route' => $announce->id ? ['announces.update', $announce] : ['announces.store'], 'method' => $announce->exist ? 'PUT' : 'POST']) !!}
                {!! Form::bsText('title', null, ['required']) !!}
                {!! Form::bsSelect('categories', $categories, $announce->category != null ? $announce->category->id : null) !!}
                {!! Form::bsTextarea('content', null, ['style' => 'min-height:300px']) !!}
                {!! Form::bsButton('Enregistrer') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
