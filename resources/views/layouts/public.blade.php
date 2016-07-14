@extends('layouts.base')

@section('base_stylesheet')
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
@stop

@section('base_content')

    @if(Auth::user() && Auth::user()->isAdmin())
    @endif


    @if(Auth::user())
        <div class="vertical-menu">
            <ul class="form">
                <li><a class="profile" href="{{ url('profile') }}"><i class="icon-user"></i>Edit Profile</a></li>
                <li><a class="messages" href="{{ route('posts.create') }}"><i class="icon-envelope-alt"></i>Proposer un article</a></li>
            </ul>
        </div>
    @endif


    @yield('content')


    <footer class="footer" style="text-align: center">
        <div class="container">
            <ul>
                <li>CGU</li> -
                <li>Contact</li>
            </ul>
        </div>
    </footer>

@stop
