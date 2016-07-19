@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.contacts.index') }}">Contact</a></li>
        <li class="active">{{ $contact->created_at->format('d/m/Y à h:m') }}</li>
    </ol>

    <div class="row">
        <div class="col-md-6">
            <p>{{ $contact->first_name }}</p>
            <p>{{ $contact->last_name }}</p>
            <p>{{ $contact->email }}</p>
            <p>{{ $contact->message }}</p>
        </div>
    </div>

@stop
