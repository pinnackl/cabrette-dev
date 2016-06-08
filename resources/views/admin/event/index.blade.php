@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Events</li>
    </ol>

    <p>
        <a href="{{ route('admin.events.create') }}" class="btn btn-secondary">
            <i class="fa fa-plus"></i> Nouvel évènement
        </a>
    </p>

    {{--@include('partials.table', ['items' => $events, 'resource' => 'events', 'columns' => ['title', 'content', 'date_start'], 'actions' => ['edit', 'destroy']])--}}

    <div class="calendar calendar-event" data-fetch-url="{{ route('event-calendar') }}">
        <div id="user-calendar"></div>
    </div>

@stop

@section('footer-link')
    @parent

@stop
