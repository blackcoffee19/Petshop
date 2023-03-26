<div class="pagination py-3 pagination-cus">
    @if ($paginator->hasPages())
        <ul class="list-unstyled p-0 m-0">
            @if ($paginator->onFirstPage())
                <a class="d-inline-block p-16 disabled" style="border-radius: 10px 0 0 10px " href="javascript:void(0)"><li>Previous</li></a>
            @else
                <a class="d-inline-block p-16" style="border-radius: 10px 0 0 10px " href="{{ $paginator->previousPageUrl() }}"><li>Previous</li></a>
            @endif
 
            @foreach ($elements as $element)
 
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif
 
 
 
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="is-active d-inline-block p-16" href="javascript:void(0)"><li>{{ $page }}</li></a>
                        @else
                            <a class="d-inline-block p-16" href="{{ $url }}"><li>{{ $page }}</li></a>
                        @endif
                    @endforeach
                @endif
            @endforeach
 
 
 
            @if ($paginator->hasMorePages())
                <a class="d-inline-block p-16" style="border-radius: 0 10px 10px 0" href="{{ $paginator->nextPageUrl() }}"><li>Next</li></a>
            @else
                <a class="d-inline-block p-16" style="border-radius: 0 10px 10px 0" href="javascript:void(0)"><li>Next</li></a>
            @endif
 
 
        </ul>
    @endif
</div>