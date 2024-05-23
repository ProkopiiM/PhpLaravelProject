<ul class="pagination">
    @if ($paginator->onFirstPage())
        <li style="margin: 10px" class="disabled"><span>&laquo;</span></li>
    @else
        <li style="margin: 10px" ><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <li style="margin: 10px"  class="disabled"><span>{{ $element }}</span></li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li style="margin: 10px"  class="active"><span>{{ $page }}</span></li>
                @else
                    <li style="margin: 10px" ><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <li style="margin: 10px" ><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
    @else
        <li style="margin: 10px"  class="disabled"><span>&raquo;</span></li>
    @endif
</ul>
