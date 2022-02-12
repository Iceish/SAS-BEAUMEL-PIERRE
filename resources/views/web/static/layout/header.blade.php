<header id="static">

    <input id="dropdown" type="checkbox" checked/>

    <label for="dropdown" id="dropdown__btn"></label>

    <nav>
        <img src="{{ @asset('img/logo.png') }}" alt="logo" height="96px">
        <ul role="list">
            <li>
                <a href={{ route('home') }}>Home</a>
            </li>
            <li>
                <a href={{ route('about') }}>About us</a>
            </li>
            <li>
                <a href={{ route('partners') }}>Partners</a>
            </li>
            <li>
                <a href={{ route('clients') }}>Clients</a>
            </li>
            <li>
                <a href="{{ route('auth.login.view') }}">Login</a>
            </li>
        </ul>
    </nav>

</header>
