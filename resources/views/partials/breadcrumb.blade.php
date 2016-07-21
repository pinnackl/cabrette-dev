<div class="container">
    <div class="row">
    <ol class="breadcrumb" style="background: #fff;border-radius: 3px;box-shadow: 0 3px 7px -3px rgba(0, 0, 0, 0.3);">
        @if($item == '')
            <li>{{ $item_principal }}</li>
        @else
            <li><a href="{{ route($link_item_principal.'.index') }}" style="color: #ffcc33">{{ $item_principal }}</a></li>
            <li>{{ $item->title }}</li>
        @endif
    </ol>
    </div>
</div>
