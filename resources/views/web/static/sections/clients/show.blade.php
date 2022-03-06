@extends('web.static.layout')

@section('main')
    <div>
        @foreach($clients as $client)
            {!! $client->language[0]->pivot->content !!}
        @endforeach
    </div>
@endsection
