<div class="container-fluid pb-3 " style="background: #730C02;">
    <div class="container pb-2">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-2 ">
       <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 fs-3  text-decoration-none link-light p-0" style="font-weight: 500;font-style: oblique">
          Clinique Seydi Jamil
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-2 link-secondary">Accueil</a></li>
          <li><a href="" class="nav-link px-2 link-light">Service</a></li>
          <li><a href="{{ route('liste-emploi-temps') }}" class="nav-link px-2 link-light">Emplois du temps</a></li>
          {{-- <li><a href="#" class="nav-link px-2 link-light">FAQ</a></li> --}}
          <li><a href="#" class="nav-link px-2 link-light">À propos de</a></li>
        </ul>

        @if (Auth::User())
        <div class="row text-end pt-2" style="margin-right: 3em ">
          <form class="" method="POST" action="{{ route('logout') }}"> @csrf <button type="submit" class="btn btn-primary">Me déconnecter</button></form>
        </div>
        @else
        <div class="col-md-3 text-end me-5">
            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Me connecter</a>
            <a href="{{ route('register') }}" class="btn btn-primary">M'inscrire</a>
        </div>
        @endif
      </header>
    </div>
    <div class="container-fluid border-bottom"></div>
  </div>

