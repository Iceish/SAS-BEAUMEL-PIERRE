@extends('web.static.layout')

@section('main')
    <div class="ck-content">
        @foreach($clients as $client)
            {!! $client->language[0]->pivot->content !!}
        @endforeach
    </div>
@endsection
