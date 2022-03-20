@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.creating', ['item' => trans_choice('custom/words.user', 2)])) }}</h2>
    <div>
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    </div>
    <form action="{{ route("dashboard.users.store") }}" method="post">
        @csrf
        <h4>{{ ucfirst(__('custom/words.data.crud.create')) }}</h4>

        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}</label>
            <input type="text" id="name" name="name" placeholder="John Doe" required value="{{ old('name') }}"/>
        </div>

        <div class="field">
            <label for="email">{{ ucfirst(__('custom/words.data.input.email.default.label')) }}</label>
            <input type="email" id="email" name="email" placeholder="{{ __('custom/words.data.input.email.default.placeholder') }}" required value="{{ old('email') }}"/>
        </div>
        <div id="multiselect" class="field">
            <label for="selectBoxOption">{{ ucfirst(trans_choice('custom/words.role', 2)) }}</label>
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
                        <input type="hidden" id="checkbox-{{ $loop->iteration }}-hidden" name="roles[{{ $role->id }}]" value="false"/>
                        <input type="checkbox" id="checkbox-{{ $loop->iteration }}" onclick="inputCheckBox(this)" />{{ $role->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.address.label')) }}</label>
            <input type="text" id="address" name="address" placeholder="12 rue de la paix" value="{{ old('address') }}"/>
        </div>
        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.number.postal-code.label')) }}</label>
            <input type="text" id="postal_code" name="postal_code" placeholder="63000" value="{{ old('postal_code') }}"/>
        </div>
        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.city.label')) }}</label>
            <input type="text" id="city" name="city" placeholder="Clermont-Ferrand" value="{{ old('city') }}"/>
        </div>

        <div class="field">
            <label for="tel">{{ ucfirst(__('custom/words.data.input.text.tel.label')) }}</label>
            <input type="text" id="tel" name="tel" placeholder="{{ __('custom/words.data.input.text.tel.placeholder') }}" value="{{ old('tel') }}"/>
        </div>

        <div class="buttons">
            <x-utils.cancelBtn/>
            <input class="btn" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
        </div>
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
