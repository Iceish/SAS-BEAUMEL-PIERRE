@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('text.editing_user')) }} {{ $user->name }}</h2>
    <form id="edit" action="{{ route('dashboard.users.update',['user'=>$user->id]) }}" method="post">
        @csrf
        @method('put')
        <h4>Edit</h4>
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
                        <input type="hidden" id="checkbox-{{ $loop->iteration }}-hidden" name="roles[{{ $role->id }}]" value="{{ $user->hasRole($role) ? "true" : "false" }}"/>
                        <input type="checkbox" id="checkbox-{{ $loop->iteration }}" {{ $user->hasRole($role) ? "checked" : "" }} onclick="inputCheckBox(this)" />{{ $role->name }}
                    </label>
                @endforeach
            </div>

        </div>

        <!-- rajout -->
        <div class="field">
            <label for="name">{{ ucfirst(__('word.address')) }}</label>
            <input type="text" id="address" name="address" @if($user->address)value="{{ $user->address }}" @else placeholder="Non renseigné"@endif/>
        </div>
        <div class="field">
            <label for="name">{{ ucfirst(__('word.postal')) }}</label>
            <input type="text" id="postal_code" name="postal_code" @if($user->postal_code)value="{{ $user->postal_code }}" @else placeholder="Non renseigné"@endif/>
        </div>
        <div class="field">
            <label for="name">{{ ucfirst(__('word.city')) }}</label>
            <input type="text" id="city" name="city" @if($user->city)value="{{ $user->city }}" @else placeholder="Non renseigné"@endif/>
        </div>

        <!-- fin rajout -->

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
