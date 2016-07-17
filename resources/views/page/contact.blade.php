@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <section class="content-section">
            <div class="row">
                <h2>Contact</h2>
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
