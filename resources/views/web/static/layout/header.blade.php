<header>

    <input id="dropdown" type="checkbox" checked/>

    <label for="dropdown" id="dropdown__btn">
        <i class="fa-solid fa-angle-down fa-xl"></i>
    </label>

    <nav>
        <img src="{{ @asset('img/logo.png') }}" alt="logo" height="96px">
        <ul role="list">
            <li>
                <a href={{ route('home') }}>{{ ucfirst(__('custom/words.home')) }}</a>
            </li>
            <li>
                <a href={{ route('partners') }}>{{ ucfirst(trans_choice('custom/words.partner',false)) }}</a>
            </li>
            <li>
                <a href={{ route('clients') }}>{{ucfirst(trans_choice('custom/words.client',false)) }}</a>
            </li>
            <li>
                <a href={{ route('about') }}>{{ ucfirst(__('custom/words.about-us')) }}</a>
            </li>
            <li>
                <a href="{{ route('auth.login.view') }}">
                @guest() {{ ucfirst(__('custom/words.login')) }} @endguest
                @auth() {{ ucfirst(__('custom/words.dashboard')) }} @endauth
                </a>
            </li>
        </ul>
    </nav>

</header>
