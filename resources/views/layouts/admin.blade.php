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

                <li class="nav-item {{ Request::segments()[1] == 'events' ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('admin.events.index') }}">Events</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Annonces</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.categories.index') }}">Catégories</a>
                        <a class="dropdown-item" href="{{ route('admin.announces.index') }}">Les annonces</a>
                    </div>
                </li>

                <li class="nav-item {{ Request::segments()[1] == 'courses' ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('admin.courses.index') }}">Cours</a>
                </li>
                <li class="nav-item {{ Request::segments()[1] == 'medias' ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('admin.medias.index') }}">Média</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Forum</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.themes.index') }}">Thèmes</a>
                        <a class="dropdown-item" href="{{ route('admin.forums.index') }}">Sujets</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.pages.association') }}">L'association</a>
                        <a class="dropdown-item" href="{{ route('admin.pages.cabrette') }}">La cabrette</a>
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

    <script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@stop
