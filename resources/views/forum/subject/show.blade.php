@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    @include('partials.breadcrumb', ['link_item_principal' => 'themes' , 'item_principal'=> 'Theme Forum', 'item' => '' ])

    <div class="container">
        <section class="content-section">
            <div id='main'>
                <div id='posts-list'>
                    <div class='post'>
                        <h3>{{ $post->title }}</h3>
                        <p> {!! Markdown::convertToHtml($post->content)  !!}</p>
                    </div>
                </div>
                @if(Auth::user())
                    <div class="block-comment">
                        {!! Form::open() !!}
                            {!! Form::bsTextarea('comment') !!}
                            {!! Form::bsButton('Enregistrer') !!}
                        {!! Form::close() !!}
                    </div>
                @endif
            </div>
        </section>
    </div>

@stop
