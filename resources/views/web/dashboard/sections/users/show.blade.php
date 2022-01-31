@extends('web.dashboard.layout')

@section('main')
    <p>Only one user here.</p>
    {{ $user->email }}

    <form action="" method="get">
        <div class="multiselect">

            <div class="selectBox" onclick="showCheckboxes()">
                <select>
                    <option>Roles</option>
                </select>
                <div class="overSelect"></div>
            </div>

            <div id="checkboxes">
                @foreach($roles as $role)
                    @if($user->hasRole($role))
                        <label for="{{ $loop->iteration }}">
                            <input type="checkbox" id="one" name="test[{{ $role->name }}]" checked/>{{ $role->name }}</label>
                    @else
                        <label for="{{ $loop->iteration }}">
                            <input type="checkbox" id="one" name="test[{{ $role->name }}]"  />{{ $role->name }}</label>
                    @endif
                @endforeach
            </div>

        </div>
        <input type="submit" value="Send"/>
    </form>

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
@endsection

