@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <section class="content-section">
            <div id='main'>
                <div id='posts-list' style="padding-top: 10px">
                    @foreach($announces as $announce)
                        <div class="blog-card">
                            <div class="description" style="width: inherit">
                                <h1 style="font-size: 28px">{{ $announce->title }}</h1>
                                <h2><small>Publié le {{ $announce->created_at->format('d/m/Y à h:i') }}  par {{ $announce->user->full_name }}</small></h2>
                                <p class="summary">{!! substr(Markdown::convertToHtml($announce->content), 0 , 180)  !!} ...</p>
                                <a href="{{ route('announces.show', [$announce]) }}"> Voir plus</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

@stop
