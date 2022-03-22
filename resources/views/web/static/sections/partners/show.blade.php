@extends('web.static.layout')

@section('main')
    <div class="ck-content">
        @foreach($partners as $partner)
            {!! $partner->language[0]->pivot->content ?? "" !!}
        @endforeach
    </div>
@endsection
