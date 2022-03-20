@extends('web.static.layout')

@section('main')
    <x-utils.returnedMessage/>
    <section id="contactus">
        <form action="{{route('contactus.store')}}" method="POST">
            @csrf
            <h4>Contact us</h4>
            <div class="field">
                <label for="email">Email</label>
                <input name="from" id="email" type="email" placeholder="{{ ucfirst(__('custom/words.data.input.email.default.placeholder')) }}" autocomplete="off" value="{{ old('email') }}" required/>
            </div>
            <div class="field">
                <label for="subject">Subject</label>
                <input name="subject" id="subject" type="text" placeholder="{{ ucfirst(__('custom/words.data.input.text.subject.placeholder')) }}" autocomplete="off" value="{{ old('subject') }}" required/>
            </div>
            <div class="field">
                <label for="content">Message</label>
                <textarea name="content" id="content" placeholder="{{ ucfirst(__('custom/words.data.input.textarea.message.placeholder')) }}" maxlength="255" required>{{old('content')}}</textarea>
            </div>
            <input class="btn" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}"/>
        </form>

    </section>
@endsection
