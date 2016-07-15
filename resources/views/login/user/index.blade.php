@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <div class="row">
            <div class="card col-md-6 col-md-offset-3">
                <div class="card-block">
                    {!! Form::open(['route' => 'login.store']) !!}
                    {!! Form::bsEmail('email', null, ['required']) !!}
                    {!! Form::bsPassword('password', null, ['required']) !!}
                    {!! Form::bsButton('Envoyer') !!}
                    {!! Form::close() !!}
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <a class="btn btn-link" style="padding-left: 0;" href="{{ url('/password/reset') }}">Vous avez oublié votre mot de passe ?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
