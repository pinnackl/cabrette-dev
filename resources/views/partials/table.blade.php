<?php
    $url = isset($url) ? $url : route('admin.'.$resource.'.index');
?>

<table class="table table-hover">
    <thead>
        <tr>
            @foreach($columns as $column)
                <th>{{ trans('validation.attributes.'.$column) }}</th>
            @endforeach

            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
                @foreach($columns as $column)
                    <td>{{ $item->$column }}</td>
                @endforeach

                <td class="action-cell">
                    @if (in_array('show', $actions))
                        <a href="{{ $url.'/'.$item->id }}" class="btn btn-sm btn-link" title="Voir">
                            <i class="fa fa-eye"></i>
                        </a>
                    @endif

                    @if (in_array('edit', $actions))
                        <a href="{{ $url.'/'.$item->id.'/edit' }}" class="btn btn-sm btn-link" title="Éditer">
                            <i class="fa fa-pencil"></i>
                        </a>
                    @endif

                    @if (in_array('destroy', $actions))
                        {!! Form::open(['url' => $url.'/'.$item->id, 'method' => 'DELETE']) !!}
                            <button type="submit" class="btn btn-sm btn-link" title="Supprimer" onClick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        {!! Form::close() !!}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<div class="pagination-container">
    {!! $items->setPath($url)->appends(Input::all())->render() !!}
</div>
