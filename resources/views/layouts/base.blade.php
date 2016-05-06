<!DOCTYPE html>
<html>
<head>
    <title>Cabrettes et Cabrettaires</title>
    <meta charset ="utf-8">
    <meta name="description" content="">
    <meta name="keywords"   content=" " >
    <meta name="robots"     content="index,follow " >
    <meta name="author"     content="PinnacklTeam" >
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon"/>

    <meta property="og:title" content="Cabrettes et Cabrettaires"/>
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />

    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">

    @yield('base_stylesheet')
</head>
<body>

    @yield('base_content')

    <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/main.js') }}"></script>
</body>
</html>
