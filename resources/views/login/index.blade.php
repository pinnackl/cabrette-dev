@extends('layouts.base')

@section('base_content')

    <div class="container">

        <br><br>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                @if (Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        <i class="fa fa-warning"></i> {{ Session::get('error') }}
                    </div>
                @endif

                <div class="card">
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
            </div>
        </div>
    </div>

@stop
