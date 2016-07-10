<div class="container">
    <ol class="breadcrumb">
        @if($item == '')
            <li>{{ $item_principal }}</li>
        @else
            <li><a href="{{ route($link_item_principal.'.index') }}">{{ $item_principal }}</a></li>
            <li>{{ $item->title }}</li>
        @endif
    </ol>
</div>
