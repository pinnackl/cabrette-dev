@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <div class="calendar calendar-event" data-fetch-url="{{ route('event-all') }}">
            <div id="user-calendar"></div>
        </div>
    </div>

@stop
