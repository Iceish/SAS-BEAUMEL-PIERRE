@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('text.editing.role')) }} {{ $role->name }}</h2>
    <form id="edit" action="{{ route('dashboard.roles.update',['role'=>$role->id]) }}" method="post">
        @csrf
        @method('put')
        <h4>Edit</h4>
        <div class="field">
            <label for="name">{{ ucfirst(__('word.name')) }}</label>
            <input type="text" id="name" name="name" value="{{ $role->name }}" />
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
                @foreach($permissions as $permission)
                    <label for="checkbox-{{ $loop->iteration }}">
                        <input type="hidden" id="checkbox-{{ $loop->iteration }}-hidden" name="permissions[{{ $permission->id }}]" value="{{ $role->hasPermissionTo($permission->name) ? "true" : "false" }}"/>
                        <input type="checkbox" id="checkbox-{{ $loop->iteration }}" {{ $role->hasPermissionTo($permission->name) ? "checked" : "" }} onclick="inputCheckBox(this)" />{{ $permission->name }}
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
            const multiselect = document.querySelector("#multiselect");
            expanded ? multiselect.classList.remove('active') : multiselect.classList.add('active');
            expanded = !expanded;
        }

        function inputCheckBox(element){
            let id = element.getAttribute("id");
            let hiddenElement = document.querySelector(`#${id}-hidden`);
            hiddenElement.value = !!element.checked;
        }
    </script>
@endpush
