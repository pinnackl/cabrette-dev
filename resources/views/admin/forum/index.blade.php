@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="active">Forum</li>
    </ol>

    <p>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary">
            <i class="fa fa-plus"></i> Nouveau sujet
        </a>
    </p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Theme</th>
            <th>Statut</th>
            <th class="action-cell">Modifier statut</th>
            <th class="pull-right">Editer / Supprimer</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subjects as $key => $post)
            <tr>
                <td>{{ $key +1 }}</td>
                <td>{{ $post->title }}</td>
                <td>@if($post->theme){{ $post->theme->title }}@endif</td>
                <td>
                    @if($post->state == 0)
                        Incatif
                    @elseif($post->state == 1)
                        Actif
                    @elseif($post->state == 2)
                        En attente de validation
                    @endif
                </td>
                <td class="action-cell">
                    @if($post->state == 0 or $post->state == 2)
                        {!! Form::open(['url' => 'admin/posts/'.$post->id, 'method' => 'PUT']) !!}
                            {!! Form::hidden('state', 1) !!}
                            <button type="submit" class="btn btn-link">
                                Activer
                            </button>
                        {!! Form::close() !!}
                    @elseif($post->state == 1)
                        {!! Form::open(['url' => 'admin/posts/'.$post->id, 'method' => 'PUT']) !!}
                            {!! Form::hidden('state', 0) !!}
                            <button type="submit" class="btn btn-link" title="Supprimer">
                                Désactiver
                            </button>
                        {!! Form::close() !!}
                    @endif
                </td>
                <td class="action-cell pull-right">
                    <a href="{{ url('admin/posts/'.$post->id.'/edit') }}" class="btn btn-sm btn-link" title="Éditer">
                        <i class="fa fa-pencil"></i>
                    </a>

                    {!! Form::open(['url' => 'admin/posts/'.$post->id, 'method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-sm btn-link" title="Supprimer" onClick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
                        <i class="fa fa-trash-o"></i>
                    </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--@include('partials.table', ['items' => $subjects, 'resource' => 'posts', 'columns' => ['title', 'link_url'], 'actions' => ['edit', 'destroy']])--}}
@stop
