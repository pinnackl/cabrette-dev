@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Events</li>
    </ol>


    {{--@include('partials.table', ['items' => $events, 'resource' => 'events', 'columns' => ['title', 'content', 'date_start'], 'actions' => ['edit', 'destroy']])--}}

    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#myModal" style="margin-bottom: 20px">
            <i class="fa fa-plus"></i> Créer un évènement
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> Créer un évènement</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open( ['route' => ['admin.events.store'], 'method' => 'POST', 'files' => true]) !!}
                            {!! Form::bsText('title', null, ['required']) !!}
                            {!! Form::bsText('address', null, ['placeholder' => 'Paris, france']) !!}

                            <div class="form-group" style="margin-left: 26%">
                                <label for="">Date unique</label>
                                <input type="radio" name="type_date" class="radio-date" value="0" checked>
                                <label for="">Periode </label>
                                <input type="radio" name="type_date" class="radio-date"value="1">
                            </div>

                            <div class="form-group">
                                <label for="" style="width: 26%;display: inline-block">Date de l'évènement</label>
                                {!! Form::date('date_start', null, ['class' => 'form-control', 'style' => 'width:73%;display:inline-block']) !!}
                            </div>
                            <div class="form-group date-end" style="display: none">
                                <label for="" style="width: 26%;display: inline-block">Date de fin</label>
                                {!! Form::date('date_end', null, ['class' => 'form-control', 'style' => 'width:73%;display:inline-block']) !!}
                            </div>

                            {!! Form::bsTextarea('content') !!}

                            <div class="form-group">
                                <label for="" style="width: 26%;display: inline-block">Image de couverture</label>
                                {!! Form::file('cover_event') !!}
                            </div>

                            {!! Form::bsButton('Enregistrer') !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="calendar calendar-event" data-fetch-url="{{ route('event-all') }}">
        <div id="user-calendar"></div>
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
                    <div class="modal-footer">
                        {!! Form::open(['url' => 'admin/events/'.$event->id, 'method' => 'DELETE']) !!}
                        <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onClick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
                            <i class="fa fa-trash-o"></i> Supprimer l'évènement
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endforeach

@stop

@section('footer-link')
    @parent
@stop
