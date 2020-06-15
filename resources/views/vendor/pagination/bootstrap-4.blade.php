@if ($paginator->hasPages())
    <ul class="pag" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li style="cursor: pointer;">
                <span class="pag__prev" style="color: #ccc;">&#60;</span>
            </li>
        @else
            <li>
                <a class="pag__prev" href="{{ $paginator->previousPageUrl() }}">&#60;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a class="pag__num active">{{ $page }}</a></li>
                    @else
                        <li><a class="pag__num" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="pag__next" href="{{ $paginator->nextPageUrl() }}">&#62;</a>
            </li>
        @else
            <li style="cursor: pointer;">
                <span class="pag__next" style="color: #ccc;">&#62;</span>
            </li>
        @endif
    </ul>
@endif
