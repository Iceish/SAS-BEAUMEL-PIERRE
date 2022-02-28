<div class="generic-card">
    @if(auth()->user()->can("$perm.destroy"))
        <form id="destroy-row-{{ $content->id }}" style="display: none" method="post" action="{{ route($route["route"].".destroy",[$route["parameters"]=>$content->id]) }}">
            @csrf
            @method('DELETE')
        </form>
        <a href="" onclick="Utils.confirm(() => {
            window.document.querySelector('#destroy-row-{{$content->id}}').submit();
            });
            return false;"
        ><i class="fa-solid fa-trash"></i></a>
    @endif

    @if(auth()->user()->can("$perm.edit"))
        <a href="{{ route($route["route"] . ".edit",[$route['parameters'] => $content->id]) }}"><i class="fa-solid fa-pen"></i></a>
    @endif

    @foreach($show as $label)
        <p>{{ $label["name"] }} {{ $content[$label["attributeName"]] }}</p>
    @endforeach
</div>
