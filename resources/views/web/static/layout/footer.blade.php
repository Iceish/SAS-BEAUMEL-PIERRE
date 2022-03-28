<footer>
    <p>{{ __('custom/words.company.name') }}</p>
    <ul role="list">
        <li><a href="{{route("contactus.create")}}">{{ ucfirst(__('custom/words.contact-us')) }}</a></li>
        <li><a href="{{route("eula") }}">{{ __('custom/words.eula') }}</a></li>
        <li><a href="{{route("aboutdev")}}">{{ ucfirst(__('custom/words.about-developers')) }}</a></li>
        <li><a href="https://goo.gl/maps/CRyxEDBnnk4g6cwE6" target="_blank">{{ ucfirst(__('custom/words.map')) }}</a></li>
    </ul>

    <hr>

    <p>{{ __('custom/messages.informative.copyright') }}</p>
</footer>
