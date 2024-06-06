<nav id="sidebar" class="bg-dark navbar-dark">
    <div id="top-sidebar">
        <a href="/" class="nav-link text-white">
            <h2 class="p-2">
                <i class="fa-solid fa-square-rss pe-2"></i>Admin
            </h2>
        </a>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}"><i
                        class="fa-solid fa-tachometer-alt fa-lg fa-fw pe-4"></i>Dasboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-white {{ Route::currentRouteName() == 'admin.projects.index' ? 'active' : '' }}"
                    href="{{ route('admin.projects.index') }}"> <i
                        class="fa-solid fa-newspaper fa-lg fa-fw pe-4"></i>Projects</a>
            </li>
    </div>
    <div id="bottom-sidebar">
        <ul>
            <li class="nav-item border-top border-2 border-white align-items-end list-unstyled pt-3">
                <a class="nav-link me-3 me-lg-0" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                    title="Logout">
                    <i class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Log Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
