@extends('layouts.base')

@section('base_stylesheet')
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
@stop

@section('base_content')
    <div class="container public-container">
        @yield('content')
    </div>
@stop
