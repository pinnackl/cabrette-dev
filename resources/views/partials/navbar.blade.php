<header>
    <h1><a href="{{ route('/') }}">Cabrettes <img src="{{ asset('img/cabrette-logo.png') }}" alt="" width="100px"> Cabrettaires</a></h1>

</header>
<?php if(Request::segments()) { $segment = Request::segments()[0]; }else {$segment='';} ?>
<nav class="navbar navbar-light bg-faded">
    <div class="container">
        <ul class="nav navbar-nav">
            @if(Auth::user())
                <li class="nav-item active">
                    <a class="nav-link" href="#">Bonjour {{ Auth::user()->full_name }} </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ $segment == 'association' ? 'active' : ''}}" href="{{ route('association') }}">L'association</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $segment == 'cabrette' ? 'active' : ''}}" href="{{ route('cabrette') }}">La cabrette</a>
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
                <a class="nav-link {{ $segment == 'announces' ? 'active' : ''}}" href="{{ route('announces.index') }}">Petites annonces</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $segment == 'courses' ? 'active' : ''}}" href="{{ route('courses.index') }}">Cours</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $segment == 'forum' ? 'active' : ''}}" href="{{ route('forum.index') }}">Forum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $segment == 'agenda' ? 'active' : ''}}" href="{{ route('agenda.index') }}">Agenda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $segment == 'contact' ? 'active' : ''}}" href="{{ route('contact') }}">Contact</a>
            </li>

            @if(Auth::user())
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
    </div>
</nav>
