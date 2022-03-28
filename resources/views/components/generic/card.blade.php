<div class="generic-card">

    {{-- Attributes --}}
    <div class="generic-card__attributes">
    @forelse($show as $label)
            <p><span class="label">{{ htmlspecialchars_decode($label["name"]) }}</span>

        @if(!isset($content[$label["attributeName"]]))
            {{ ucfirst(__('custom/words.data.null')) }}
            @continue
        @endif

        @if(is_iterable($content[$label["attributeName"]]))
            @forelse($content[$label["attributeName"]] as $row)
                {{ $row[$label["attributeNameF"]] }}
                @empty
                {{ ucfirst(__('custom/words.data.null')) }}
            @endforelse
        @elseif(is_bool($content[$label["attributeName"]]))
            {{ $content[$label["attributeName"]] ? 'True' : 'False' }}
        @else
             {{ $content[$label["attributeName"]] }}
        @endif
        </p>

        @empty
        <p>{{ __('custom/messages.informative.nothing.here') }}</p>
    @endforelse
    </div>

    {{--  Actions  --}}
    @if($crud)
    <div class="generic-card__actions">

        @if(auth()->user()->can("$perm.destroy"))
            <form id="destroy-row-{{ $content->id }}" style="display: none" method="post" action="{{ route($route["route"].".destroy",[$route["parameters"]=>$content->id]) }}">
                @csrf
                @method('DELETE')
            </form>
            <a class="danger" href="" onclick="Utils.confirm(() => {
                window.document.querySelector('#destroy-row-{{$content->id}}').submit();
                });
                return false;"
            ><i class="fa-solid fa-trash"></i></a>
        @endif

        @if(auth()->user()->can("$perm.edit"))
            <a href="{{ route($route["route"] . ".edit",[$route['parameters'] => $content->id]) }}"><i class="fa-solid fa-pen"></i></a>
        @endif

            <a class="gray" href="#" onclick="window.print()"><i class="fa-solid fa-print"></i></a>

    </div>
    @endif

</div>
