<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="#" class="nav-link" data-widget="pushmenu" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown">
                Username <i class="fas fa-caret-down ml-1"></i>
            </a>
            <div class="dropdown-menu dropdown-sm dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <a href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
                class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                </a>
                <form action="#" id="logout-form" method="POST">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>