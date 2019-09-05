@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">

        {{-- Znaci ako je na prvoj stranici da islkuci link da se ne moze klikut, inace dodaj link u href, ovo nazad zamjeni necim, ruzn o je ovako, skotaj nesto}}
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a class="page-link">Natrag</a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Natrag</a></li>
        @endif

        {{-- ovo ti je broj stranica koliko ce ih bit, 1,2,3,4,5,6... }}
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled"><a class="page-link">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    {{-- ako je na trenutnoj stranici iskljuci da se moze kliknut na nju, ovo $page ti je varijabla stranice, znaci nju ugradjujes u sta hoces, samo da lipo izgleda --}}
                    {{-- $url je url od trenutne stranice, vadi ih for petljom iz svih mogucih stranica; znaci uzima broj stranice i url --}}
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        {{-- isto ko i gore --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Naprijed</a></li>
        @else
            <li class=" page-item disabled"><a class="page-link">Naprijed</a></li>
        @endif
    </ul>
@endif
