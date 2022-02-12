<div class="custom-table">
    <div class="custom-table__head">
        @foreach($keys as $key)
            <p>{{$key[1]}}</p>
        @endforeach
    </div>

    @foreach($content as $row)

        <a href="{{ route("dashboard.$contentName.show", [substr($contentName,0,-1) => $row->id]) }}">

            @foreach($keys as $key)

                @if($key[0][0] === ':')

                    @if( count( $row->{substr($key[0], 1)}()->toArray() ) > 1 )
                        @foreach( $row->{substr($key[0], 1)}() as $item)

                            <p>{{$item}}</p>

                        @endforeach

                    @elseif( count( $row->{substr($key[0], 1)}()->toArray() ) == 1)
                        <p>{{ $row->{substr($key[0], 1)}()->toArray()[0] }}</p>
                    @else
                        <p>...</p>
                    @endif

                @else
                    <p>{{ $row->{$key[0]} }}</p>
                @endif

            @endforeach

        </a>

    @endforeach


</div>
