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

@stop

@section('footer-link')
    @parent
@stop
