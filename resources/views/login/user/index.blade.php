@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="row">
        <div class="card col-md-6 col-md-offset-3">
            <div class="card-block">
                {!! Form::open(['route' => 'login.store']) !!}
                {!! Form::bsEmail('email', null, ['required']) !!}
                {!! Form::bsPassword('password', null, ['required']) !!}
                {!! Form::bsButton('Envoyer') !!}
                {!! Form::close() !!}
            </div>
        </div>

    </div>

@stop
