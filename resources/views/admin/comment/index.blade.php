@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Commentaires</li>
    </ol>

    @include('partials.table', ['items' => $comments, 'resource' => 'comments', 'columns' => ['content', 'state'], 'actions' => ['destroy']])

@stop
