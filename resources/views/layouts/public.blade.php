@extends('layouts.base')

@section('base_stylesheet')
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
@stop

@section('base_content')

    @if(Auth::user() && Auth::user()->isAdmin())
    @endif


    @if(Auth::user())
        <nav class="vertical-menu">
            <ul class="nav navbar-nav">
                <li><a class="profile" href="{{ url('profile') }}"><i class="fa fa-user"></i> Mon Profil</a></li>
                <li><a class="" href="{{ route('posts.index') }}"><i class="fa fa-list"></i> Mes articles</a></li>
                <li><a class="" href="{{ route('annonces.index') }}"><i class="fa fa-list"></i> Mes annonces</a></li>
            </ul>
        </nav>
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
