@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Contact</li>
    </ol>

    @include('partials.table', ['items' => $contacts, 'resource' => 'contacts', 'columns' => ['last_name', 'first_name','email', 'message', 'created_at'], 'actions' => ['show', 'destroy']])

@stop
