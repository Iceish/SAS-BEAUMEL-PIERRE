@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.users.show',['user'=> $user->id]) }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>Editing user id "{{ $user->id }}"</h2>
    <form id="edit" action="">
        <div class="field">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" />
        </div>

        <div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" />
        </div>
        <div id="multiselect" class="field">
            <label for="selectBoxOption">Roles</label>
            <div id="selectBoxOption" class="selectBox" onclick="showCheckboxes()">
                <select>
                    <option>Click to open</option>
                </select>
                <div class="overSelect"></div>
            </div>

            <div id="checkboxes">
                @foreach($roles as $role)
                    @if($user->hasRole($role))
                        <label for="checkbox-{{ $loop->iteration }}">
                            <input type="checkbox" id="checkbox-{{ $loop->iteration }}" name="test[{{ $role->name }}]" checked/>{{ $role->name }}</label>
                    @else
                        <label for="checkbox-{{ $loop->iteration }}">
                            <input type="checkbox" id="checkbox-{{ $loop->iteration }}" name="test[{{ $role->name }}]"  />{{ $role->name }}</label>
                    @endif
                @endforeach
            </div>
        </div>

        <input class="btn btn--primary" type="submit" value="Confirm update" />
    </form>
@endsection

@push('js')
    <script>
        let expanded = false;

        function showCheckboxes() {
            const checkboxes = document.getElementById("checkboxes");
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
