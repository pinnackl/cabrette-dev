@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Utilisateurs</li>
    </ol>

    <p>
        <a href="{{ route('admin.users.create') }}" class="btn btn-secondary">
            <i class="fa fa-plus"></i> Nouvel utilisateur
        </a>
    </p>

    @include('partials.table', ['items' => $users, 'resource' => 'users', 'columns' => ['full_name', 'email', 'role'], 'actions' => ['edit', 'destroy']])

@stop
