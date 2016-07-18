@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    @include('partials.breadcrumb', ['link_item_principal' => 'annonces' , 'item_principal'=> 'Annonces', 'item' => $announce ])

    <div class="container">
        <section class="content-section">
            <div class="row">
                <h2>{{ $announce->title }}</h2>

                <div class="col-md-10">
                    {!! Markdown::convertToHtml($announce->content)  !!}
                </div>
                <div class="col-md-2">
                    <a class="btn btn-secondary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="margin-bottom: 10px">
                        Contact
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="well">
                            {{ $announce->user->full_name }}
                            <a href="">{{ $announce->user->email }}</a> <br>
                            {{ $announce->user->phone }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
