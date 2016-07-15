@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    @include('partials.breadcrumb', ['link_item_principal' => 'articles' , 'item_principal'=> 'Mes articles', 'item' => '' ])

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $key => $post)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{ $post->title }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop
