@extends('layouts.public')

@section('base_content')

    @include('partials.navbar')

    <div class="card col-md-5">
        <div class="card-block">
            {!! Form::open(['route' => 'login.store']) !!}
            {!! Form::bsEmail('email', null, ['required']) !!}
            {!! Form::bsText('first_name') !!}
            {!! Form::bsText('last_name') !!}
            {!! Form::bsPhone('phone') !!}
            {!! Form::bsPassword('password', null, ['required']) !!}
            {!! Form::bsPassword('confirm_password', null, ['required']) !!}
            {!! Form::bsButton('Envoyer') !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
