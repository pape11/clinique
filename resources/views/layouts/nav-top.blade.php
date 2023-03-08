<nav class="sb-topnav navbar fixed-top navbar-expand navbar-dark" style="background: #730C02;">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-2 fs-4" style="text-align: start ;"><i class="fas fa-user fa-fw"></i> <i class="pt-5">Connecté</i></a>
    <!-- Sidebar Toggle-->
    {{-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> --}}
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Recherchez-vous..." aria-label="Recherchez-vous..." aria-describedby="btnNavbarSearch" />
            <button class="btn" id="btnNavbarSearch" type="button" style="background:  #F2B988"><i class="fas fa-search" ></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                @if (Auth::User())
                <div class="row text-center pt-2" style="text-align: center ">
                  <form class="" method="POST" action="{{ route('logout') }}"> @csrf <button type="submit" class="btn text-dark tnav-link">Déconnecter</button></form>
                </div>
                @else
                <div class="col-md-3 text-end me-5">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Me connecter</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">M'inscrire</a>
                </div>
                @endif
            </ul>
        </li>
    </ul>
</nav>
