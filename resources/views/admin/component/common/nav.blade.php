<nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">

    <ul class="navbar-nav border-left flex-row ">

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">

               @if(session()->has("user"))
                <span class="d-none d-md-inline-block">{{session()->get("user")->ime_korisnika}}</span>
                   @endif
            </a>
            <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item" href="{{route("user.show",["id"=>session()->get("user")->idKorisnik])}}">
                    <i class="material-icons">&#xE7FD;</i> Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="{{route('logout')}}">
                    <i class="material-icons text-danger">&#xE879;</i> Logout </a>
            </div>
        </li>
    </ul>
    <nav class="nav">
        <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
            <i class="material-icons">&#xE5D2;</i>
        </a>
    </nav>
</nav>
