<header>

    <input id="dropdown" type="checkbox" checked/>

    <label for="dropdown" id="dropdown__btn">
        <i class="fa-solid fa-angle-down fa-xl"></i>
    </label>

    <nav>
        <h1>{{ ucfirst(__('custom/words.dashboard')) }}</h1>
        <ul role="list">
            <li><a href="{{ route('dashboard.home') }}"><i class="fa-solid fa-house-user"></i>{{ ucfirst(__('custom/words.home')) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @if(auth()->user()->can('edit'))
                    <li><a href="{{ route('dashboard.cameras.index') }}"><i class="fa-solid fa-video"></i>{{ ucfirst(trans_choice('custom/words.camera', false)) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('clients.list'))
                    <li><a href="{{ route('dashboard.clients.index') }}"><i class="fa-solid fa-cash-register"></i>{{ ucfirst(trans_choice('custom/words.client', false)) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('provider.list'))
                <li><a href="{{ route('dashboard.providers.index') }}"><i class="fa-solid fa-truck-pickup"></i>{{ ucfirst(trans_choice('custom/words.provider', false)) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('partners.list'))
                    <li><a href="{{ route('dashboard.partners.index') }}"><i class="fa-solid fa-handshake"></i>{{ ucfirst(trans_choice('custom/words.partner', false)) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('vehicles.list'))
                    <li><a href="{{ route('dashboard.vehicles.index') }}"><i class="fa-solid fa-tractor"></i>{{ ucfirst(trans_choice('custom/words.vehicle', false)) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('invoices.list'))
                    <li><a href="{{ route('dashboard.invoices.index') }}"><i class="fa-solid fa-file-invoice"></i>{{ ucfirst(trans_choice('custom/words.invoice', false)) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('providers.list'))
                    <li><a href="{{ route('dashboard.products.index') }}"><i class="fa-solid fa-feather-pointed"></i>{{ ucfirst(trans_choice('custom/words.product', false)) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('users.list'))
                    <li><a href="{{ route('dashboard.users.index') }}"><i class="fa-solid fa-users"></i>{{ ucfirst(trans_choice('custom/words.user', false)) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif
            @if(auth()->user()->can('roles.list'))
                    <li><a href="{{ route('dashboard.roles.index') }}"><i class="fas fa-balance-scale-right"></i>{{ ucfirst(trans_choice('custom/words.role', false)) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>
            @endif

            <li><a href="{{ route('dashboard.settings.edit') }}"><i class="fa-solid fa-gears"></i>{{ ucfirst(trans_choice('custom/words.setting', false)) }}<i class="arrow fa-solid fa-caret-right"></i></a></li>

        </ul>

        <div id="user-toast">
            <img class="avatar" src="{{ asset('img/user.jpg') }}" alt="user" width="48px">
            <p class="avatar-title">{{ ucfirst(Auth::user()->name) }}</p>
            <div id="user-toast__nav">
                <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i></a>
                <a href="{{route('dashboard.profile.edit')}}"><i class="fa-solid fa-user"></i></a>
                <a href="{{ route('auth.logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>

        </div>
    </nav>
</header>
