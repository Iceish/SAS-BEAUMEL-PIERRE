@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.users.show',['user'=> $user->id]) }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>{{ ucfirst(__('text.editing_user')) }} {{ $user->name }}</h2>
    <form id="edit" action="">
        <div class="field">
            <label for="name">{{ ucfirst(__('word.name')) }}</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" />
        </div>

        <div class="field">
            <label for="email">{{ ucfirst(__('word.email')) }}</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" />
        </div>
        <div id="multiselect" class="field">
            <label for="selectBoxOption">{{ ucfirst(__('word.roles')) }}</label>
            <div id="selectBoxOption" class="selectBox" onclick="showCheckboxes()">
                <label>
                    <select>
                        <option>{{ ucfirst(__('text.click_open')) }}</option>
                    </select>
                </label>
                <div class="overSelect"></div>
            </div>

            <div id="checkboxes">
                @foreach($roles as $role)
                    <label for="checkbox-{{ $loop->iteration }}">
                        <input type="checkbox" id="checkbox-{{ $loop->iteration }}" name="test[{{ $role->name }}]" {{ $user->hasRole($role) ? "checked" : "" }} />{{ $role->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('word.confirm')) }}" />
    </form>
@endsection

@push('js')
    <script>
        let expanded = false;

        function showCheckboxes() {
            const checkboxes = document.querySelector("#checkboxes");
            if (!expanded) {
                checkboxes.style.display = "block";
                expanded = true;
            } else {
                checkboxes.style.display = "none";
                expanded = false;
            }
        }
    </script>
@endpush
