@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <section class="content-section">
            <div id='main'>
                <div id='posts-list'>
                    @foreach($announces as $announce)
                        <div class='post'>
                            <h3>{{ $announce->title }}</h3>
                            <p> {!! substr(Markdown::convertToHtml($announce->content), 0 , 400)  !!} ... <a href="{{ route('announces.show', [$announce]) }}">Voir plus</a></p>
                            <div style="position: absolute;right: 5px; bottom: 5px">
                                <small>Publié le {{ $announce->created_at->format('d/m/Y à h:i') }}  par {{ $announce->user->full_name }}</small>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </section>
    </div>

@stop
