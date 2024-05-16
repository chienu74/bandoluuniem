@if ($paginator->hasPages())
<nav class="app-pagination mt-5">
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a class="page-link" style="background-color: #f89cab;color: white">Previous</a>

        </li>
        @else
        <li class="page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a style="background-color: #f89cab;color: black" href="{{ $paginator->previousPageUrl() }}" class="page-link">Previous</a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <a class="disabled" aria-disabled="true"><span>{{ $element }}</span></a>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item active">
            <a class="page-link" style="background-color: #f89cab;border: none;" aria-current="page"><span>{{ $page }}</span></a>
        </li>
        @else
        <li class="page-item">
            <a class="page-link" style="color: #f89cab" href="{{ $url }}">{{ $page }}</a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item" rel="next" aria-label="@lang('pagination.next')">
            <a style="background-color: #f89cab;color: black" class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a>

        </li>
        @else
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <a style="background-color: #f89cab;color: white" class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next</a>

        </li>
        @endif
    </ul>
</nav>
@endif
