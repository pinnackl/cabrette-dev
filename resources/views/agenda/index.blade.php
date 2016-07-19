@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <div class="calendar calendar-event" data-fetch-url="{{ route('event-all') }}">
            <div id="user-calendar"></div>
        </div>
    </div>

    @foreach($events as $event)
        <div class="modal modal-event-{{ $event->id }} fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Evènement  {{ $event->title }}</h4>
                    </div>
                    <div class="modal-body">
                        @if($event->cover_event)
                            <div style="text-align: center;margin-bottom: 20px">
                                <img src="{{ asset('uploads/events/'.$event->cover_event) }}" alt="" style="width: 400px;height:200px;">
                            </div>
                        @endif
                        <p>Adresse : {{ $event->address }}</p>
                        <p>{!! Markdown::convertToHtml($event->content)  !!}</p>
                    </div>
                </div>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endforeach

@stop
