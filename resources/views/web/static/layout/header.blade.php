<header id="static">

    <input id="dropdown" type="checkbox" checked/>

    <label for="dropdown" id="dropdown__btn">
        <i class="fa-solid fa-angle-down fa-xl"></i>
    </label>

    <nav>
        <img src="{{ @asset('img/logo.png') }}" alt="logo" height="96px">
        <ul role="list">
            <li>
                <a href={{ route('home') }}>{{ ucfirst(__("word.home")) }}</a>
            </li>
            <li>
                <a href={{ route('about') }}>{{ ucfirst(__("word.about-us")) }}</a>
            </li>
            <li>
                <a href={{ route('partners') }}>{{ ucfirst(__("word.partners")) }}</a>
            </li>
            <li>
                <a href={{ route('clients') }}>{{ ucfirst(__("word.clients")) }}</a>
            </li>
            <li>
                <a href="{{ route('auth.login.view') }}">{{ ucfirst(__("word.login")) }}</a>
            </li>
        </ul>
    </nav>

</header>
