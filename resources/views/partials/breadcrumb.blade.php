<div class="container">
    <ol class="breadcrumb" style="padding-left: 0;padding-right: 0">
        @if($item == '')
            <li>{{ $item_principal }}</li>
        @else
            <li><a href="{{ route($link_item_principal.'.index') }}">{{ $item_principal }}</a></li>
            <li>{{ $item->title }}</li>
        @endif
    </ol>
</div>
