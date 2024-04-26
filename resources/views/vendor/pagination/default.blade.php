<!-- CSS -->
<link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
<!-- ICON -->
<script src="https://kit.fontawesome.com/a1fe272ba9.js" crossorigin="anonymous"></script>

@if ($paginator->hasPages())
<nav class="page">
    <ul id="list">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <!-- <li class="arrow" aria-disabled="true">
            <span aria-hidden="true"><i class="fa-solid fa-caret-left"></i></span>
        </li> -->
        @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
            <li><i class="fa-solid fa-caret-left"></i></li>
        </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
        @else
        <a href="{{ $url }}">
            <li>{{ $page }}</li>
        </a>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next">
            <li class="arrow"><i class="fa-solid fa-caret-right"></i></li>
        </a>
        @else
        <!-- <li class="arrow" aria-disabled="true">
            <span aria-hidden="true"><i class="fa-solid fa-caret-right"></i></span>
        </li> -->
        @endif
    </ul>
</nav>
@endif