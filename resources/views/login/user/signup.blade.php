@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <div class="row ">
            @if (Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-warning"></i> {{ Session::get('error') }}
                </div>
            @endif
            <div class="card col-md-6 col-md-offset-3">
                <div class="card-block">
                    {!! Form::open(['route' => 'signup.store', 'method' => 'POST']) !!}
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
        </div>
    </div>
@stop
