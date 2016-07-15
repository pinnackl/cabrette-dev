@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    @include('partials.breadcrumb', ['link_item_principal' => 'profile' , 'item_principal'=> 'Edition Profil ', 'item' => '' ])

    <div class="container">
        <div class="row" style="min-height: 450px">
            <div class="col-md-6">

                <legend>Modifier les informations</legend>
                {!! Form::model($user, ['url' => 'profile.update', 'method' => 'PUT']) !!}
                {!! Form::bsEmail('email', null, ['required']) !!}
                {!! Form::bsText('first_name') !!}
                {!! Form::bsText('last_name') !!}
                {!! Form::bsPhone('phone') !!}

                {!! Form::bsButton('Enregistrer') !!}
                {!! Form::close() !!}

            </div>

            <div class="col-md-6">

                <legend>Modifier le mot de passe</legend>
                {!! Form::model($user, ['url' => 'profile.update', 'method' => 'PUT']) !!}
                {!! Form::bsPassword('new_password') !!}
                {!! Form::bsPassword('confirm_new_password') !!}

                {!! Form::bsButton('Enregistrer') !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@stop
