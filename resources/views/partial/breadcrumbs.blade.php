@if (count($breadcrumbs))

    <ol class="breadcrumbs flex flex-row items-center gap-[8px] text-[white]">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                </li>
                <span class="text-[18px]">/</span>
            @else
                <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ol>

@endif
