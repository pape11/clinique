<div class="container-fluid text-light" style="background: #734E39 ; width: 13.5em">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-4 px-sm-0 text-light px-0" style="background: #734E39 ; width: 35em">
            <div class="d-flex pt-3 flex-column align-items-start align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a class=" text-light fs-3 mt-5 " href="index.html">{{ Auth::User()->prenom }}</a>
                <div class="text-light fs-6 mt-4 my-1">GESTION PATIENT </div>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ route('espace-medecin-generale') }}" class="nav-link align-middle px-0"> <i class="fs-6 ms-2 bi-people text-light"></i><span class="ms-1 d-none d-sm-inline text-light">Consultations</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('MG.listes-patients') }}" class="nav-link align-middle px-0"> <i class="fs-6 ms-2 bi-people text-light"></i><span class="ms-1 d-none d-sm-inline text-light">Mes patients</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('MG.ajout-patient') }}" class="nav-link align-middle px-0"> <i class="fs-6 ms-2 bi-people text-light"></i><span class="ms-1 d-none d-sm-inline text-light">Ajout patient</span> </a>
                    </li>
                    <div class="text-light fs-6 mt-2 my-1">AUTRES OPTIONS </div>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle"><i class="fs-6 ms-2 bi-table text-light"></i> <span class="ms-1 d-none d-sm-inline text-light">Rendez-vous</span></a>
                    </li>
                    <li>
                        <a href="{{ route('MG-tdr-positive') }}" class="nav-link px-0 align-middle text-light"><i class="fs-6 ms-2 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">TDR Position</span></a>
                    </li>
                    <li>
                        <a href="{{ route('Confidentialite') }}" class="nav-link px-0 align-middle"><i class="fs-6 ms-2 bi bi-file-earmark-lock text-light"></i> <span class="ms-1 d-none d-sm-inline text-light">Confidentialité</span> </a>
                    </li>
                    <li>
                        {{--  --}}
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-5">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/images/image2.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="ms-2 d-none d-sm-inline mx-1">Utilisateur</span>
                    </a>
                    <ul class="dropdown-menu alert-warning text-small shadow " >
                        <li><a class="dropdown-item " href="{{ route('welcome') }}"> Accueil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><form class="dropdown-item" method="POST" action="{{ route('logout') }}"> @csrf <button type="submit" class="btn text-dark ms-0 ps-0 tnav-link">Déconnecter</button></form></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
