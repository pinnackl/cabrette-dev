@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.courses.index') }}">Newsletter</a></li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <legend>Modifier la newsletter</legend>
            {!! Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
            {!! Form::bsTextarea('content') !!}
            {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}
        </div>
    </div>

    <div>
        {!! Form::open(['route' => ['admin.newsletter.send'] , 'method' => 'POST']) !!}
        {!! Form::bsButton('Envoyer la newsletter à tout les utilisateurs') !!}
        {!! Form::close() !!}
    </div>

@stop
