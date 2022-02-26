<header>

    <input id="dropdown" type="checkbox" checked/>

    <label for="dropdown" id="dropdown__btn">
        <i class="fa-solid fa-angle-down fa-xl"></i>
    </label>

    <nav>
        <h1>{{ ucfirst(__('word.dashboard')) }}</h1>
        <ul role="list">
            <li><a href="{{ route('dashboard.home') }}"><i class="fa-solid fa-house-user"></i>{{ ucfirst(__('word.home')) }}</a></li>
            @if(auth()->user()->can('edit'))
                    <li><a href=""><i class="fa-solid fa-video"></i>{{ ucfirst(__('word.cameras')) }}</a></li>
            @endif
            @if(auth()->user()->can('clients.list') && auth()->user()->can('clients.create') && auth()->user()->can('clients.edit') && auth()->user()->can('clients.delete'))
                    <li><a href="{{ route('dashboard.clients.index') }}"><i class="fa-solid fa-cash-register"></i>{{ ucfirst(__('word.clients')) }}</a></li>
            @endif
            @if(auth()->user()->can('partners.list') && auth()->user()->can('partners.create') && auth()->user()->can('partners.edit') && auth()->user()->can('partners.delete'))
                    <li><a href="{{ route('dashboard.partners.index') }}"><i class="fa-solid fa-handshake"></i>{{ ucfirst(__('word.partners')) }}</a></li>
            @endif
            @if(auth()->user()->can('vehicles.list') && auth()->user()->can('vehicles.create') && auth()->user()->can('vehicles.edit') && auth()->user()->can('vehicles.delete'))
                    <li><a href="{{ route('dashboard.vehicles.index') }}"><i class="fa-solid fa-truck-pickup"></i>{{ ucfirst(__('word.vehicles')) }}</a></li>
            @endif
            @if(auth()->user()->can('invoices.list'))
                    <li><a href="{{ route('dashboard.invoices.index') }}"><i class="fa-solid fa-file-invoice"></i>{{ ucfirst(__('word.invoices')) }}</a></li>
            @endif
            @if(auth()->user()->can('providers.list') && auth()->user()->can('providers.create') && auth()->user()->can('providers.edit') && auth()->user()->can('providers.delete'))
                    <li><a href="{{ route('dashboard.products.index') }}"><i class="fa-solid fa-feather-pointed"></i>{{ ucfirst(__('word.products')) }}</a></li>
            @endif
            @if(auth()->user()->can('users.list') && auth()->user()->can('users.create') && auth()->user()->can('users.edit') && auth()->user()->can('users.delete'))
                    <li><a href="{{ route('dashboard.users.index') }}"><i class="fa-solid fa-users"></i>{{ ucfirst(__('word.users')) }}</a></li>
            @endif
            @if(auth()->user()->can('roles.list') && auth()->user()->can('roles.create') && auth()->user()->can('roles.edit') && auth()->user()->can('roles.delete'))
                    <li><a href="{{ route('dashboard.roles.index') }}"><i class="fas fa-balance-scale-right"></i>{{ ucfirst(__('word.roles')) }}</a></li>
            @endif

            <li><a href=""><i class="fa-solid fa-gears"></i>{{ ucfirst(__('word.settings')) }}</a></li>
            <li><a href="{{ route('auth.logout') }}"><i class="fa-solid fa-right-from-bracket"></i>{{ ucfirst(__('word.logout')) }}</a></li>

        </ul>
    </nav>
</header>
