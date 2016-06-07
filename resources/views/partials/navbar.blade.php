<header>
    <h1><a href="{{ route('/') }}">Cabrettes <img src="{{ asset('img/cabrette-logo.png') }}" alt="" width="100px"> Cabrettaires</a></h1>

</header>

<nav class="navbar navbar-light bg-faded">
    <ul class="nav navbar-nav">
        @if(Auth::user())
            <li class="nav-item active">
                <a class="nav-link" href="#">Bonjour {{ Auth::user()->full_name }} </a>
            </li>
        @endif
        <li class="nav-item active">
            <a class="nav-link" href="#">Actualités <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">L'association</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">La cabrette</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Media</a>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Videos</a>
            <a class="dropdown-item" href="#">Musiques</a>
            <a class="dropdown-item" href="#">Partitions</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::segments() == 'announces' ? 'active' : ''}}" href="{{ route('announces.index') }}">Petites annonces</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::segments() == 'courses' ? 'active' : ''}}" href="{{ route('courses.index') }}">Cours</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Forum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Agenda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
        </li>

        @if(Auth::user())
            <li class="nav-item">
                <a class="nav-link " href="">Proposer un article</a>
            </li>
            <li class="nav-item pull-right">
                <a class="nav-link " href="{{ url('logout') }}">Deconnexion</a>
            </li>
        @else
            <li class="nav-item pull-right">
                <a class="nav-link" href="{{ url('signup') }}">Inscription</a>
            </li>
            <li class="nav-item pull-right">
                <a class="nav-link " href="{{ url('login') }}">Connexion</a>
            </li>
        @endif
    </ul>
</nav>
