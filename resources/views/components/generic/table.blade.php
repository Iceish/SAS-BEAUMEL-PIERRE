<div class="generic-table">
    <div class="generic-table__tools">
        @if(in_array('search',$crud))
            <form class="search" action="#">
                <div class="field no-label">
                    <input type="text" id="search" name="search" value="{{ old('search') }}" placeholder="{{ucfirst(__('custom/words.data.crud.search'))}}" autocomplete="off"/>
                </div>
                <a href="#" onclick="this.parentNode.submit();return false;"><i class="fa-solid fa-2x fa-magnifying-glass"></i></a>
                <a href="{{ url()->current() }}" @if( !app('request')->input('search')) style="visibility: hidden" @endif><i class="fa-solid fa-2x fa-arrow-rotate-right"></i></a>

            </form>
        @endif
            <div class="buttons">
                <a class="btn btn--bold generic-table__button" id="printBtn"><i class="fa-solid fa-print"></i> {{ ucfirst(__('custom/words.print')) }}</a>
                @if(in_array('create',$crud) && auth()->user()->can("$perm.create"))
                    <a class="btn btn--bold generic-table__button" href="{{ route($route["route"].".create") }}"><i class="fa-solid fa-plus"></i>{{ucfirst(__('custom/words.data.crud.create'))}}</a>
                @endif
            </div>

    </div>

    <div class="generic-table__head">
            @foreach($columns as $column)
                <div>
                    <p>{{ htmlspecialchars_decode($column["name"]) }}</p>
                </div>
            @endforeach
        <div>{{ucfirst(trans_choice('custom/words.data.crud.action',false))}}</div>
    </div>
    @foreach($content as $row)
        <div class="generic-table__row">
            @foreach($columns as $column)
                <div>
                    @if(is_iterable($rowData = $row[$column["attributeName"]]))
                        @forelse($rowData as $val)
                            <p><span class="label">{{ $column["name"] }}</span>{{ $val[$column["attributeNameF"]] }}</p>
                        @empty
                            {{ucfirst(__('custom/words.data.null'))}}
                        @endforelse
                    @else
                        @if($column["attributeNameF"])
                            <p><span class="label">{{ htmlspecialchars_decode($column["name"]) }}</span>{{ $rowData[$column["attributeNameF"]] ?? ucfirst(__('custom/words.data.null')) }}</p>
                        @else
                            <p><span class="label">{{ htmlspecialchars_decode($column["name"]) }}</span>{{ $rowData ?? ucfirst(__('custom/words.data.null')) }}</p>
                        @endif
                    @endif
                </div>
            @endforeach
            <div class="actions">
                @foreach($crud as $action)
                    @if($action == 'destroy' && auth()->user()->can("$perm.destroy"))
                        <form id="destroy-row-{{ $row->id }}" style="display: none" method="post" action="{{ route($route["route"].".".$action,[$route["parameters"]=>$row->id]) }}">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a class="danger" href="" onclick="Utils.confirm(() => {
                                window.document.querySelector('#destroy-row-{{$row->id}}').submit();
                            });
                            return false;"
                        ><i class="fa-solid fa-trash"></i></a>
                    @elseif($action == 'show')
                        <a href="{{ route($route["route"].".".$action,[$route["parameters"]=>$row->id]) }}"><i class="fa-solid fa-eye"></i></a>
                    @elseif($action == 'edit' && auth()->user()->can("$perm.edit"))
                        <a href="{{ route($route["route"].".".$action,[$route["parameters"]=>$row->id]) }}"><i class="fa-solid fa-pen"></i></a>
                    @elseif($action == 'print')
                        <a class="gray" href="#" onclick="elemPrint('{{ route($route["route"].".show",[$route["parameters"]=>$row->id]) }}')"><i class="fa-solid fa-print"></i></a>
                    @endif

                @endforeach
            </div>
        </div>
    @endforeach

    @if($content instanceof \Illuminate\Pagination\AbstractPaginator && $content->hasPages())
    <div class="generic-table__pagination">
            <a href="{{$content->previousPageUrl() }}"><i class="fa-solid fa-caret-left fa-2x"></i></a>
            <p>{{ $content->currentPage() }}</p>
            <a href="{{$content->nextPageUrl() }}"><i class="fa-solid fa-caret-right fa-2x"></i></a>
    </div>
    @endif
</div>

@push('js')
    <script>
        let btnPrint = document.querySelector('#printBtn');
        btnPrint.addEventListener('click',()=>{
            window.print()
        })

        function elemPrint(route){
            let printw = window.open(route, 'PRINT', 'height=auto,width=auto');
            printw.onload = () => {
                printw.print();
                printw.close();
            }

        }
    </script>
@endpush

