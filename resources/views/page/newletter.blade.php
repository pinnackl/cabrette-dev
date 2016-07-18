@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">

        <div class="row">
            <h2 class="title-media" style="margin-bottom: 30px !important;">Newsletter</h2>
            {!! Form::open(['url' => route('newsletter'), 'method' => 'POST', 'style' => 'padding-left:20px']) !!}
            {!! Form::bsEmail('email', null, ['required']) !!}
            {!! Form::bsButton('Envoyer') !!}
            {!! Form::close() !!}
        </div>

    </div>

@stop
