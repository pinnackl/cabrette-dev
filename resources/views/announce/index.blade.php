@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <section class="content-section">
        <div class="row">
            <ul>
                @foreach($announces as $announce)
                    <li>
                        <a href="{{ route('announces.show', [$announce]) }}">{{ $announce->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@stop
