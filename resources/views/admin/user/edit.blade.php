@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.users.index') }}">Utilisateurs</a></li>
        <li class="active">{{ $user->exists ? 'Modifier l\'utilisateur' : 'Nouvel utilisateur' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-6">

            <legend>Modifier les informations</legend>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
                {!! Form::bsEmail('email', null, ['required']) !!}
                {!! Form::bsText('first_name') !!}
                {!! Form::bsText('last_name') !!}
                {!! Form::bsPhone('phone_1') !!}
                {!! Form::bsPhone('phone_2') !!}
                {!! Form::bsText('zip_code') !!}
                {!! Form::bsText('function') !!}
                {!! Form::bsSelect('role', ['admin' => 'Admin', 'coach' => 'Coach', 'user' => 'Utilisateur'], null, ['required']) !!}

                {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}

        </div>

        <div class="col-md-6">

            <legend>Modifier le mot de passe</legend>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
                {!! Form::bsText('password', '') !!}

                {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}

        </div>
    </div>

@stop
