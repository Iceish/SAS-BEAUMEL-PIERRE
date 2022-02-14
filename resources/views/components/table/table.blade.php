<div class="custom-table">
    <div class="custom-table__head">
            @foreach($columns as $column)
                    <div>{{ $column["name"] }}</div>
            @endforeach
    </div>
    @foreach($content as $row)
        <a href="{{route($route["route"],[$route["parameters"]=>$row->id])}}">

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
        </a>
    @endforeach
</div>
