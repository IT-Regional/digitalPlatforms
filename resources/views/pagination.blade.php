@if (isset($paginator) && $paginator->lastPage() > 1)
    <ul class="pagination">
        @php
            $interval = isset($interval) ? abs(intval($interval)) : 3;
            $from = $paginator->currentPage() - $interval;
            if ($from < 1) {
                $from = 1;
            }
            $to = $paginator->currentPage() + $interval;
            if ($to > $paginator->lastPage()) {
                $to = $paginator->lastPage();
            }
        @endphp

        @if ($paginator->currentPage() > 1)
            <li>
                <a href="{{ $paginator->url(1) }}" aria-label="First">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <li>
                <a href="{{ $paginator->url($paginator->currentPage() - 1) }}" aria-label="Previous">
                    <span aria-hidden="true">‹</span>
                </a>
            </li>
        @endif

        @for ($i = $from; $i <= $to; $i++)
            @php
                $isCurrentPage = $paginator->currentPage() == $i;
            @endphp
            <li class="{{ $isCurrentPage ? 'active' : '' }}">
                <a href="{{ !$isCurrentPage ? $paginator->url($i) : '#' }}">
                    {{ $i }}
                </a>
            </li>
        @endfor

        @if ($paginator->currentPage() < $paginator->lastPage())
            <li>
                <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" aria-label="Next">
                    <span aria-hidden="true">›</span>
                </a>
            </li>
            <li>
                <a href="{{ $paginator->url($paginator->lastpage()) }}" aria-label="Last">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        @endif
    </ul>
@endif
