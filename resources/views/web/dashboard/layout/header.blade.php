<header>

    <input id="dropdown" type="checkbox" checked/>

    <label for="dropdown" id="dropdown__btn">
        <i class="fa-solid fa-angle-down fa-xl"></i>
    </label>

    <nav>
        <h1>{{ ucfirst(__('word.dashboard')) }}</h1>
        <ul role="list">
            <li><a href="{{ route('dashboard.home') }}"><i class="fa-solid fa-house-user"></i>{{ ucfirst(__('word.home')) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @if(auth()->user()->can('edit'))
                    <li><a href=""><i class="fa-solid fa-video"></i>{{ ucfirst(__('word.cameras')) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('clients.list'))
                    <li><a href="{{ route('dashboard.clients.index') }}"><i class="fa-solid fa-cash-register"></i>{{ ucfirst(__('word.clients')) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('partners.list'))
                    <li><a href="{{ route('dashboard.partners.index') }}"><i class="fa-solid fa-handshake"></i>{{ ucfirst(__('word.partners')) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('vehicles.list'))
                    <li><a href="{{ route('dashboard.vehicles.index') }}"><i class="fa-solid fa-tractor"></i>{{ ucfirst(__('word.vehicles')) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('invoices.list'))
                    <li><a href="{{ route('dashboard.invoices.index') }}"><i class="fa-solid fa-file-invoice"></i>{{ ucfirst(__('word.invoices')) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('providers.list'))
                    <li><a href="{{ route('dashboard.products.index') }}"><i class="fa-solid fa-feather-pointed"></i>{{ ucfirst(__('word.products')) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('users.list'))
                    <li><a href="{{ route('dashboard.users.index') }}"><i class="fa-solid fa-users"></i>{{ ucfirst(__('word.users')) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('roles.list'))
                    <li><a href="{{ route('dashboard.roles.index') }}"><i class="fas fa-balance-scale-right"></i>{{ ucfirst(__('word.roles')) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif

            <li><a href=""><i class="fa-solid fa-gears"></i>{{ ucfirst(__('word.settings')) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>

        </ul>

        <div id="user-toast">
            <img class="avatar" src="{{ asset('img/user.jpg') }}" alt="user" width="48px">
            <p class="avatar-title">{{ ucfirst(Auth::user()->name) }}</p>
            <div id="user-toast__nav">
                <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i></a>
                <a href=""><i class="fa-solid fa-user"></i></a>
                <a href="{{ route('auth.logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>

        </div>
    </nav>
</header>
