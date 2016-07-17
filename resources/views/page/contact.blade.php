@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">

            <div class="row">
                <h2 class="title-media" style="margin-bottom: 30px !important;">Contact</h2>
                {!! Form::open(['url' => route('contact'), 'method' => 'POST', 'style' => 'padding-left:20px']) !!}
                    {!! Form::bsText('first_name', null, ['required']) !!}
                    {!! Form::bsText('last_name', null, ['required']) !!}
                    {!! Form::bsEmail('email', null, ['required']) !!}
                    {!! Form::bsTextarea('message', null, ['style' => 'min-height:100px']) !!}
                    {!! Form::bsButton('Envoyer') !!}
                {!! Form::close() !!}
            </div>

    </div>

@stop
