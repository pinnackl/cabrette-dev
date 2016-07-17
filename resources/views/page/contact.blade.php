@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <section class="content-section">
            <div class="row">
                <h2 style="background: #fff;border-radius: 3px;box-shadow: 0 3px 7px -3px rgba(0, 0, 0, 0.3);margin-top: 20px">Contact</h2>
                {!! Form::open(['url' => route('contact'), 'method' => 'POST', 'style' => 'padding-left:20px']) !!}
                    {!! Form::bsText('first_name', null, ['required']) !!}
                    {!! Form::bsText('last_name', null, ['required']) !!}
                    {!! Form::bsEmail('email', null, ['required']) !!}
                    {!! Form::bsTextarea('message', null, ['style' => 'min-height:100px']) !!}
                    {!! Form::bsButton('Envoyer') !!}
                {!! Form::close() !!}
            </div>
        </section>
    </div>

@stop
