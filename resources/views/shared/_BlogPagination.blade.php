<div class="pages">
    @if ($page > 1)
        <a href="{{url("?page=$previousPage")}}">&lt;</a>
    @endif

    <a class="active" href="{{url("?page=$page")}}">{{$page}}</a>

    @if ($last>=$nextPage)
            <a href="{{url("?page=$nextPage")}}">&gt;</a>
    @endif
</div>
