<div class="custom-table">
    @if(in_array('create',$crud))
        <a class="btn btn--bold custom-table__button" href="{{ route($route["route"].".create") }}"><i class="fa-solid fa-plus"></i>Create</a>
    @endif
    <div class="custom-table__head">
            @foreach($columns as $column)
                <div>
                    <p>{{ $column["name"] }}</p>
                </div>
            @endforeach
        <div>Actions</div>
    </div>
    @foreach($content as $row)
        <div class="custom-table__row">
            @foreach($columns as $column)
                <div>
                    @if(is_iterable($rowData = $row[$column["attributeName"]]))
                        @foreach($rowData as $val)
                            <p><span class="label">{{ $column["name"] }}</span>{{ $val[$column["attributeNameF"]] }}</p>
                        @endforeach
                    @else
                        <p><span class="label">{{ $column["name"] }}</span>{{ $rowData }}</p>
                    @endif
                </div>
            @endforeach
            <div class="actions">
                @foreach($crud as $action)
                    @if($action == 'destroy')
                        <form id="destroy-row-{{ $row->id }}" style="display: none" method="post" action="{{ route($route["route"].".".$action,[$route["parameters"]=>$row->id]) }}">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="" onclick="Utils.confirm(() => {
                                window.document.querySelector('#destroy-row-{{$row->id}}').submit();
                            });
                            return false;"
                        ><i class="fa-solid fa-trash"></i></a>
                    @elseif($action == 'show')
                        <a href="{{ route($route["route"].".".$action,[$route["parameters"]=>$row->id]) }}"><i class="fa-solid fa-magnifying-glass"></i></a>
                    @elseif($action == 'edit')
                        <a href="{{ route($route["route"].".".$action,[$route["parameters"]=>$row->id]) }}"><i class="fa-solid fa-pen"></i></a>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</div>
