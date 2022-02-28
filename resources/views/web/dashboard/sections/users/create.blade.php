@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.users.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>{{ ucfirst(__('text.creating_user')) }}</h2>
    <form id="edit" action="{{ route("dashboard.users.store") }}" method="post">
        @csrf
        <h4>Create</h4>
        <div class="field">
            <label for="name">{{ ucfirst(__('word.name')) }}</label>
            <input type="text" id="name" name="name" placeholder="John Doe"/>
        </div>

        <div class="field">
            <label for="email">{{ ucfirst(__('word.email')) }}</label>
            <input type="email" id="email" name="email" placeholder="{{ __('form.placeholder.email') }}"/>
            <div>
                @foreach ($errors->get('email') as $message)
                {{$message}}
                @endforeach
            </div>
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
                        <input type="hidden" id="checkbox-{{ $loop->iteration }}-hidden" name="roles[{{ $role->id }}]" value="false"/>
                        <input type="checkbox" id="checkbox-{{ $loop->iteration }}" onclick="inputCheckBox(this)" />{{ $role->name }}
                    </label>
                @endforeach
            </div>
        </div>
        <!-- rajout -->
        <div class="field">
            <label for="name">adresse</label>
            <input type="text" id="adresse" name="name" placeholder="adresse"/>
        </div>
        <div class="field">
            <label for="name">code postale</label>
            <input type="text" id="cdp" name="name" placeholder="code postale"/>
        </div>
        <div class="field">
            <label for="name"> ville </label>
            <input type="text" id="ville" name="name" placeholder="ville"/>
        </div>

        <!-- fin rajout -->

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('word.confirm')) }}" />
        <p class="caption"><i class="fa-solid fa-circle-exclamation"></i> Password will be generated and sent to user's email.</p>
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
