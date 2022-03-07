<div class="generic-card">

    {{-- Attributes --}}
    <div class="generic-card__attributes">
    @forelse($show as $label)
            <p><span class="label">{{ $label["name"] }}</span>

        @if(!isset($content[$label["attributeName"]]))
            Non renseigné
            @continue
        @endif

        @if(is_iterable($content[$label["attributeName"]]))
            @foreach($content[$label["attributeName"]] as $row)
                {{ $row[$label["attributeNameF"]] }}
            @endforeach
        @elseif(is_bool($content[$label["attributeName"]]))
            {{ $content[$label["attributeName"]] ? 'Vrai' : 'False' }}
        @else
             {{ $content[$label["attributeName"]] }}
        @endif
        </p>

        @empty
        <p>Nothing to show here.</p>
    @endforelse
    </div>

    {{--  Actions  --}}
    <div class="generic-card__actions">

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

    </div>

</div>
