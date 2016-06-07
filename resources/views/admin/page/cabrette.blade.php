@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.courses.index') }}">Page présentation de la cabrette</a></li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <legend>Modifier les informations</legend>
            {!! Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
            {!! Form::bsTextarea('content') !!}
            {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
