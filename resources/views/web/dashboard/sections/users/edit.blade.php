@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.editing', ['item' => $user->name])) }}</h2>
    <form action="{{ route('dashboard.users.update',['user'=>$user->id]) }}" method="post">
        @csrf
        @method('put')
        <h4>{{ ucfirst(__('custom/words.data.crud.edit')) }}</h4>
        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.name.label')) }}</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" />
        </div>

        <div class="field">
            <label for="email">{{ ucfirst(__('custom/words.data.input.email.default.label')) }}</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" />
        </div>
        <div id="multiselect" class="field">
            <label for="selectBoxOption">{{ ucfirst(trans_choice('custom/words.role', false)) }}</label>
            <div id="selectBoxOption" class="selectBox" onclick="showCheckboxes()">
                <label>
                    <select>
                        <option>{{ ucfirst(__('custom/words.click')) }}</option>
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

        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.address.label')) }}</label>
            <input type="text" id="address" name="address" @if($user->address)value="{{ $user->address }}" @else placeholder="{{ucfirst(__('custom/words.data.input.text.address.placeholder'))}}"@endif/>
        </div>
        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.number.postal-code.label')) }}</label>
            <input type="text" id="postal_code" name="postal_code" @if($user->postal_code)value="{{ $user->postal_code }}" @else placeholder="{{ucfirst(__('custom/words.data.input.number.postal-code.placeholder'))}}"@endif/>
        </div>
        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.city.label')) }}</label>
            <input type="text" id="city" name="city" @if($user->city)value="{{ $user->city }}" @else placeholder="{{ucfirst(__('custom/words.data.input.text.city.placeholder'))}}"@endif/>
        </div>


        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
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
