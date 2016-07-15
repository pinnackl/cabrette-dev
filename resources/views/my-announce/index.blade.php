@extends('layouts.public')

@section('content')

    @include('partials.navbar')

    @include('partials.breadcrumb', ['link_item_principal' => 'articles' , 'item_principal'=> 'Mes articles', 'item' => '' ])

    <div class="container">
        <a class="pull-right" href="{{ route('annonces.create') }}"><i class="fa fa-plus"></i>Créer une annonce</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th class="pull-right">Editer / supprimer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($announces as $key => $announce)
                <tr>
                    <td>{{ $key +1 }}</td>
                    <td>{{ $announce->title }}</td>
                    <td class="action-cell pull-right">
                        <a href="{{ 'posts/'.$announce->id.'/edit' }}" class="btn btn-sm btn-link" title="Éditer">
                            <i class="fa fa-pencil"></i>
                        </a>

                        {!! Form::open(['url' => 'posts/'.$announce->id, 'method' => 'DELETE']) !!}
                        <button type="submit" class="btn btn-sm btn-link" title="Supprimer" onClick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
