@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.images.index') }}">Home Images</a></li>
        <li class="active">{{ $image->exists ? 'Modifier l\'image ' : 'Nouvelle image' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <legend>Modifier les informations</legend>
            {!! Form::model($image, ['route' => ['admin.images.update', $image], 'method' => $image->id ? 'PUT' : 'POST', 'files' => true]) !!}
                <div class="form-group">
                    <label for="" style="width: 25%">Image </label>
                    {!! Form::file('image_filename') !!}
                </div>
                {!! Form::bsInput('number', 'order', $image->order ? $image->order : $nbImages + 1, ['style' => 'width:20%', 'placeholder' => '0']) !!}
                {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
