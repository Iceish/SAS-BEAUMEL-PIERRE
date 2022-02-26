<div class="custom-table">
    <div class="custom-table__head">
            @foreach($columns as $column)
                    <div>{{ $column["name"] }}</div>
            @endforeach
        <div>Actions</div>
    </div>
    @foreach($content as $row)
        <div class="custom-table__row">
            @foreach($columns as $column)
                <div>
                    @if(is_iterable($rowData = $row[$column["attributeName"]]))
                        @foreach($rowData as $val)
                            {{ $val[$column["attributeNameF"]] }}
                        @endforeach
                    @else
                        {{ $rowData }}
                    @endif
                </div>
            @endforeach
            <div>
                @foreach($crud as $action)
                    @if($action == 'destroy')
                        <form id="destroy-row-{{ $row->id }}" style="display: none" method="post" action="{{ route($route["route"].".".$action,[$route["parameters"]=>$row->id]) }}">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a class="btn" href="" onclick="Utils.confirm(() => {
                            window.document.querySelector('#destroy-row-{{$row->id}}').submit();
                        });
                        return false;"
                        >{{ $action }}</a>
                    @else
                        <a class="btn" href="{{ route($route["route"].".".$action,[$route["parameters"]=>$row->id]) }}">{{ $action }}</a>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</div>
