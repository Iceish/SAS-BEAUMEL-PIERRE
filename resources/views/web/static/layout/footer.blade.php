<footer>
    <p>{{ __('custom/words.company.name') }}</p>
    <ul role="list">
        <li><a href="{{route("contactus.create")}}">{{ ucfirst(__('custom/words.contact-us')) }}</a></li>
        <li><a href="{{route("eula") }}">{{ __('custom/words.eula') }}</a></li>
        <li><a href="{{route("aboutdev")}}">{{ __('custom/words.about-developers') }}</a></li>
        <li><a href="">Foo</a></li>
    </ul>

    <hr>

    <p>{{ __('custom/messages.informative.copyright') }}</p>
</footer>
