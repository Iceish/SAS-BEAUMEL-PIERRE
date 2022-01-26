<header>

    <input id="dropdown" type="checkbox"/>

    <label for="dropdown" id="dropdown__btn"></label>

    <nav>
        <p>Menu</p>
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
