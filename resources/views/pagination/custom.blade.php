
@if ($paginator->hasPages())

<ul class="pagination justify-content-center">
    @if ($paginator->onFirstPage())
        <li class="page-item disabled"> <span class="page-link" >Précedent</span></li>
    @else
    <li class="page-item active"> <a class="page-link" href="{{ $paginator->previousPageUrl() }}" style="background: #734E39">Précedent</a></li>
    @endif
    @foreach ($elements as $item)
        @if (is_string($item))
            <h1>{{ $item }}</h1>
        @endif
        @if (is_array($item))

        @foreach ($item as $page=>$url)

        @if ($page == $paginator->currentPage())
            <li class="page-item disabled my-active"><span class="page-link" href="{{ $page }}">{{ $page }}</span></li>
        @else
            <li class="page-item active my-active"><a class="page-link" href="{{ $url }}" style="background: #734E39">{{ $page }}</a></li>
        @endif
            @endforeach
        @endif
    @endforeach
        @if ($paginator->hasMorePages())
            <li class="page-item active"> <a class="page-link" href="{{ $paginator->nextPageUrl() }}" style="background: #734E39">Suivant</a></li>

        @else
            <li class="page-item disabled"> <span class="page-link">Suivant</span></li>
        @endif
</ul>
@endif
