@extends('layouts.public')

@section('base_content')

    @include('partials.navbar')

    <div class="card  col-md-5">
        <div class="card-header">
            Connexion - Cabrette et Cabrettaire Admin
        </div>
        <div class="card-block">
            {!! Form::open(['route' => 'login.store']) !!}
                {!! Form::bsEmail('email', null, ['required']) !!}
                {!! Form::bsPassword('password', null, ['required']) !!}
                {!! Form::bsButton('Envoyer') !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
