<nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/"><span><i class="fas fa-lightbulb"></i></span> Idealist</a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarTop"
                onClick="document.getElementById('navbarTop').classList.toggle('is-active')">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbarTop" class="navbar-menu">
            <div class="navbar-end">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link"><i class="fas fa-user-circle"></i>{{ Auth::user()->name }}</a>
                    <div class="navbar-dropdown">
                        <a href="/settings" class="navbar-item"><i class="fas fa-cogs"></i> Settings</a>
                        <a href="/myideas" class="navbar-item"><i class="fas fa-lightbulb"></i> My Ideas</a>
                        <a href="/favorites" class="navbar-item"><i class="fas fa-star"></i> Favorites</a>
                        <a href="/history" class="navbar-item"><i class="fas fa-history"></i> History</a>
                        <hr class="navbar-divider">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
