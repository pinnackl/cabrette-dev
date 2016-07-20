@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.users.index') }}">Utilisateurs</a></li>
        <li class="active">{{ $user->exists ? 'Modifier l\'utilisateur' : 'Nouvel utilisateur' }}</li>
    </ol>

    <div class="row">
        <div class="col-md-6">

            {!! Form::model($user, ['route' => 'admin.users.store']) !!}
                {!! Form::bsEmail('email', null, ['required']) !!}
                {!! Form::bsText('first_name') !!}
                {!! Form::bsText('last_name') !!}
                {!! Form::bsPhone('phone') !!}
                {!! Form::bsPassword('password', '') !!}
                {!! Form::bsSelect('role', ['admin' => 'Admin', 'user' => 'Utilisateur'], 'user', ['required']) !!}
                {!! Form::bsButton('Enregistrer') !!}
            {!! Form::close() !!}

        </div>
    </div>

@stop
