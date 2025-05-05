<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
    <div class="sidebar-heading">
        Menú
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{ url('dashboard') }}">
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{route('profile.show', ['username' => auth()->user()->name]) }}}">
                Profile
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/itemsuser')}}">
                My Items
            </a>
        </li>
    </ul>
</nav>