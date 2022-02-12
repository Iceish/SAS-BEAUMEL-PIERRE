<header id="dashboard">

    <input id="dropdown" type="checkbox" checked/>

    <label for="dropdown" id="dropdown__btn">
        <i class="fa-solid fa-angle-down fa-xl"></i>
    </label>

    <nav>
        <h1>Dashboard</h1>
        <ul role="list">
            <li><a href="{{ route('dashboard.home') }}"><i class="fa-solid fa-house-user"></i>Home</a></li>
            <li><a href=""><i class="fa-solid fa-video"></i>Cameras</a></li>
            <li><a href=""><i class="fa-solid fa-cash-register"></i>Client</a></li>
            <li><a href=""><i class="fa-solid fa-briefcase"></i>Equipments</a></li>
            <li><a href=""><i class="fa-solid fa-file-invoice"></i>Invoices</a></li>
            <li><a href=""><i class="fa-solid fa-handshake"></i>Partners</a></li>
            <li><a href=""><i class="fa-solid fa-feather-pointed"></i>Products</a></li>
            <li><a href="{{ route('dashboard.users.index') }}"><i class="fa-solid fa-users"></i>Users</a></li>
            <li><a href="{{ route('dashboard.users.index') }}"><i class="fas fa-balance-scale-right"></i>Roles</a></li>
            <li><a href=""><i class="fa-solid fa-gears"></i>Settings</a></li>
            <li><a href="{{ route('home') }}"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
        </ul>
    </nav>
</header>
