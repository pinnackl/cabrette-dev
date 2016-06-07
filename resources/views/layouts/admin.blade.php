@extends('layouts.base')

@section('base_stylesheet')
    <link rel="stylesheet" href="{{ url('css/admin.css') }}">
@stop

@section('base_content')

    <nav class="navbar navbar-dark bg-inverse">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><b>Cabrette et Cabrettaires</b></a>
            <ul class="nav navbar-nav">
                <li class="nav-item {{ Request::segments()[1] == 'users' ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">Utilisateurs</a>
                </li>
                <li class="nav-item {{ Request::segments()[1] == 'categories' ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('admin.categories.index') }}">Catégories</a>
                </li>
                <li class="nav-item {{ Request::segments()[1] == 'posts' ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('admin.posts.index') }}">Posts</a>
                </li>
                <li class="nav-item {{ Request::segments()[1] == 'events' ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('admin.events.index') }}">Events</a>
                </li>
                <li class="nav-item {{ Request::segments()[1] == 'events' ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('admin.events.index') }}">Annonces</a>
                </li>
                <li class="nav-item {{ Request::segments()[1] == 'events' ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('admin.events.index') }}">Cours</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administration</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.medias.index') }}">Média</a>
                        <a class="dropdown-item" href="#">Forum</a>
                    </div>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li class="nav-item" style="margin-right:10px">
                    <a class="nav-link" href="{{ route('login.destroy') }}" title="Déconnexion">
                        <i class="fa fa-power-off"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container admin-container">

        @if (Session::get('info'))
            <div class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    &times;
                </button>
                <i class="fa fa-info-circle"></i> {!! Session::get('info') !!}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    &times;
                </button>
                <i class="fa fa-info-warning"></i>
                @foreach($errors->all() as $error)
                    {!! $error !!}
                @endforeach
            </div>
        @endif

        @yield('content')
    </div>

@stop
