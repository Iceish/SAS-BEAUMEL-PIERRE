@extends('web.static.layout')

@section('main')

    <section id="contactus">

        <form action="{{route('contactus.store')}}" method="POST">
            @csrf
            <h4>Contact us</h4>
            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="from" placeholder="{{ __('form.placeholder.from') }}" autocomplete="off"/>
            </div>
            <div class="field">
                <label for="text">Subject</label>
                <input id="text" type="text" name="subject" placeholder="{{ __('form.placeholder.subject') }}" autocomplete="off"/>
            </div>
            <div class="field">
                <label for="text">Message</label>
                <textarea id="text" name="content" placeholder="{{ __('form.placeholder.content') }}" maxlength="255"></textarea>
            </div>
            <input class="btn" type="submit" value="{{ ucfirst(__('word.submit')) }}"/>
        </form>

    </section>
{{--    <h1>Pour nous contacter :</h1>--}}
{{--    <h2>Ets BEAUMEL PIERRE</h2>--}}
{{--    <p>--}}
{{--        Rougeac--}}
{{--        43300 MAZEYRAT D’ALLIER--}}
{{--        TéL. 04.71.77.02.70--}}
{{--        Fax. 04.71.77.02.14--}}
{{--    </p>--}}
{{--    <h2>AGENT TECHNICO-COMMERCIAL</h2>--}}
{{--    <p>--}}
{{--        RICHARD HUGON--}}
{{--        Tél. : 06.80.35.22.45--}}
{{--        rhugon.pro@orange.fr--}}
{{--    </p>--}}
@endsection
