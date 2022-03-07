@extends('web.static.layout')

@section('main')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section id="contactus">
        <form action="{{route('contactus.store')}}" method="POST">
            @csrf
            <h4>Contact us</h4>
            <div class="field">
                <label for="email">Email</label>
                <input name="from" id="email" type="email" placeholder="{{ __('form.placeholder.email') }}" autocomplete="off" value="{{ old('email') }}" required/>
            </div>
            <div class="field">
                <label for="subject">Subject</label>
                <input name="subject" id="subject" type="text" placeholder="{{ __('form.placeholder.subject') }}" autocomplete="off" value="{{ old('subject') }}" required/>
            </div>
            <div class="field">
                <label for="content">Message</label>
                <textarea name="content" id="content" placeholder="{{ __('form.placeholder.textarea') }}" maxlength="255" required>{{old('content')}}</textarea>
            </div>
            <input class="btn" type="submit" value="{{ ucfirst(__('word.submit')) }}"/>
        </form>

    </section>
@endsection
