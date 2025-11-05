@if ($paginator->hasPages())
    <div>
        @if ($paginator->onFirstPage())
            <a> << </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"> << </a>
        @endif

        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="ativo">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <a class="ativo" href="{{ $paginator->nextPageUrl() }}"> >> </a>
        @else
            <a href="{{ $paginator->nextPageUrl() }}"> >> </a>
        @endif
    </div>
@endif
