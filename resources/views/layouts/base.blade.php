<!DOCTYPE html>
<html>
<head>
    <title>Cabrettes et Cabrettaires</title>
    <meta charset ="utf-8">
    <meta name="description" content="">
    <meta name="robots"     content="index,follow " >
    <meta name="author"     content="PinnacklTeam" >
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon"/>

    <meta property="og:title" content="Cabrettes et Cabrettaires"/>
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />

    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('css/fullcalendar.min.css')}}">

    @yield('base_stylesheet')
</head>
<body class="body-img">

    @yield('base_content')

    <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/main.js') }}"></script>

    @yield('footer-link')

    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.js') }}"></script>
    <script src="{{ asset('js/fullcalendar-fr.js') }}"></script>
    <script src="{{ asset('js/user-calendar.js') }}"></script>

</body>
</html>
