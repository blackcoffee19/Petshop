<div class="container-fluid">
    <div class="row">
        <div class="pagination py-3 pagination-cus col-6 mx-auto">
            @if ($paginator->hasPages())
                <ul class="list-unstyled p-0 m-0">
                    @if ($paginator->onFirstPage())
                        <a class="d-inline-block  disabled" style="border-radius: 10px 0 0 10px " href="javascript:void(0)"><li>Previous</li></a>
                    @else
                        <a class="d-inline-block" style="border-radius: 10px 0 0 10px " href="{{ $paginator->previousPageUrl() }}"><li>Previous</li></a>
                    @endif
                    <?php
                        $start = $paginator->currentPage() - 2; // show 3 pagination links before current
                        $end = $paginator->currentPage() + 2; // show 3 pagination links after current
                        if($start < 1) {
                            $start = 1; // reset start to 1
                            $end += 1;
                        } 
                        if($end >= $paginator->lastPage() ) $end = $paginator->lastPage(); // reset end to last page
                    ?>

                    @if($start > 1)
                        <a class="d-inline-block" href="{{ $paginator->url(1) }}"><li>{{1}}</li></a>
                        @if($paginator->currentPage() != 4)
                            {{-- "Three Dots" Separator --}}
                            <li class="d-inline-block disabled" >...</li>
                        @endif
                    @endif
                        @for ($i = $start; $i <= $end; $i++)
                            @if ($paginator->currentPage() == $i)
                                <a class="is-active d-inline-block" href="javascript:void(0)"><li>{{$i }}</li></a>
                            @else
                            <a class="d-inline-block" href="{{ $paginator->url($i) }}"><li>{{ $i }}</li></a>
                            @endif
                        @endfor
                    @if($end < $paginator->lastPage())
                        @if($paginator->currentPage() + 3 != $paginator->lastPage())
                        <li class="d-inline-block disabled" >...</li>
                        @endif
                        <a class="d-inline-block"  href="{{ $paginator->url($paginator->lastPage()) }}"><li>
                            {{$paginator->lastPage()}}
                        </li></a>
                    @endif
        
                    @if ($paginator->hasMorePages())
                        <a class="d-inline-block" style="border-radius: 0 10px 10px 0" href="{{ $paginator->nextPageUrl() }}"><li>Next</li></a>
                    @else
                        <a class="d-inline-block" style="border-radius: 0 10px 10px 0" href="javascript:void(0)"><li>Next</li></a>
                    @endif
         
         
                </ul>
            @endif
        </div>
    </div>
</div>