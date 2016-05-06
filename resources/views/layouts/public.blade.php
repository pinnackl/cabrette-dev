@extends('layouts.base')

@section('base_stylesheet')
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
@stop

@section('base_content')

    @yield('content')


    <footer id="footer">
        <div class="container">
            <ul>
                <li>CGU</li> -
                <li>Contact</li>
            </ul>
        </div>
    </footer>


@stop
