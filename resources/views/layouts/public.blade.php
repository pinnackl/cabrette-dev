@extends('layouts.base')

@section('base_stylesheet')
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
@stop

@section('base_content')

    @if(Auth::user() && Auth::user()->isAdmin())
        <div style="position: absolute;right:5px;top:5px">
            <a class="btn btn-default" style="background-color: white" href="{{ url('admin/users') }}">Retour Administration</a>
        </div>
    @endif


    @if(Auth::user() && !Auth::user()->isAdmin())
        <nav class="vertical-menu">
            <ul class="nav navbar-nav">
                <li><a class="profile" href="{{ url('profile') }}"><i class="fa fa-user"></i> Mon Profil</a></li>
                <li><a class="" href="{{ route('posts.index') }}"><i class="fa fa-list"></i> Mes articles</a></li>
                <li><a class="" href="{{ route('announces.index') }}"><i class="fa fa-thumb-tack"></i> Mes annonces</a></li>
            </ul>
        </nav>
    @endif

    <div id="layout-content">
        @yield('content')


        <footer id="footer" class="footer" style="text-align: center">
            <div class="container">
                <ul>
                    <li><a href="{{ route('cgu') }}">CGU</a></li> -
                    <li><a href="{{ route('contact') }}">Contact</a></li> -
                    <li><a href="{{ route('newsletter') }}">Newsletter</a></li>
                </ul>
            </div>
        </footer>

    </div>


    <script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>

@stop
