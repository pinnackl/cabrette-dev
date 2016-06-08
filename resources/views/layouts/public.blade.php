@extends('layouts.base')

@section('base_stylesheet')
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
@stop

@section('base_content')

    <div class="vertical-menu">
        <ul class="form">
            <li><a class="profile" href="#"><i class="icon-user"></i>Edit Profile</a></li>
            <li><a class="messages" href="#"><i class="icon-envelope-alt"></i>Proposer un article</a></li>
        </ul>
    </div>

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
