@extends('web.dashboard.layout')

@section('main')
    <form action="{{route("dashboard.roles.store")}}" method="POST">
        @csrf
        <label>
            <input name="role_name" type="text" placeholder="role name"/>
        </label>
        @foreach($permissions as $permission)
            <label>
                <input type="checkbox" name="permissions[]" value="{{$permission->id}}"/>
                {{ __($permission->name) }}
            </label>
        @endforeach
        <input type="submit">
    </form>
@endsection
