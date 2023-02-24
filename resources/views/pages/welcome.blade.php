@extends('partials.base')
@section('name')
<div style="background: #fdc797; height: 33em; background-size: cover">
    {{-- bloc 1 --}}
    <div class="container">
       @if (Session::has('ACCESS'))
           <div class="alert alert-danger mt-3">
               {{ Session::get('ACCESS') }}
           </div>
       @endif
       @if (Session::has('ACCESS-C'))
           <div class="alert alert-danger mt-3">
               {{ Session::get('ACCESS-C') }}
           </div>
       @endif
   </div>
   <div class="container p-5">
       <div class="row">
           <div class="col-6 mt-5 pt-5">
                {{-- bloc 2.1 --}}
           <div class="mt-2 pb-5 d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px; background: #734E39 ;margin: 0px ; opacity: 0.95">
               <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                 <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                 <span class="fs-4">Fonctionnalités</span>
               </a>
               <hr>
               <ul class="nav nav-pills flex-column mb-auto">
                 <li class="nav-item">
                   <a href="#" class="nav-link active" aria-current="page">
                     <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                     Consultation
                   </a>
                 </li>
                 <li>
                   <a href="#" class="nav-link text-white">
                     <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                     Echographie
                   </a>
                 </li>
                 <li>
                   <a href="#" class="nav-link text-white">
                     <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                     Pharmacie
                   </a>
                 </li>
                 <li>
                   <a href="{{ route('ajout-patient') }}" class="nav-link text-white">
                     <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                     Ajouter Patient
                   </a>
                 </li>
                 <li>
                   <a href="{{ route('liste-rendez-vous') }}" class="nav-link text-white">
                     <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                     Gestion Rendez-vous
                   </a>
                 </li>
                 <li class="">
                   <a href="{{ route('listes-patients') }}" class="nav-link text-white" aria-current="page">
                     <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                     Lister les patients
                   </a>
                 </li>
               </ul>
               <hr>

             </div>
           </div>
           <div class="col-6 p-5" style="background: #F2F2F2; opacity: 0.9;height: 13em;">
               <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-1">Bienvenue </h2>
               <h3 style="color: #730C02 ; text-decoration: underline;"  class="fs-2 ">A la Clinique Seydi Jamil</h3>
               {{-- <p class="fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, asperiores? In exercitationem aut voluptatibus omnis ipsa excepturi, voluptates dolore repellat alias nobis sequi sapiente ab saepe error consequuntur dolores hic!</p> --}}
               {{-- <a href="#" class="btn btn-primary">Lister les patients</a> --}}
               <img src="/images/logo.png" alt="" srcset="" style="width: 20em; margin-left: 3em ; ">
           </div>
       </div>
   </div>
</div>
 {{-- bloc 2 --}}
 <div class="container mb-5">
    <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-1 text-center mt-5 mb-5">Prestations</h2>
    <div class="row">
        {{-- bloc 2.1 --}}
        <div class="col-3 p-3 me-5 text-light" style="background: #BF8360 ; text-decoration: underline;">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px; background: #730C02;margin: 0px">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                  <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                  <span class="fs-4">Liste de nos spécialisations</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                    <a href="{{ route('espace-medecin-generale') }}" class="nav-link active" aria-current="page">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                      Médecin Général
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('espace-cardio') }}" class="nav-link text-white">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                      Cardiologie
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('espace-dermato') }}" class="nav-link text-white">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                      Dermatologie
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('espace-uro') }}" class="nav-link text-white">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                      Urologie
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('espace-diabeto') }}" class="nav-link text-white">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                      Diabétologie
                    </a>
                  </li>
                  <li class="">
                    <a href="{{ route('espace-orl') }}" class="nav-link text-white" aria-current="page">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                      ORL
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('espace-gyneco') }}" class="nav-link text-white">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                        Gynécologie
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('espace-cpn') }}" class="nav-link text-white">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                      CPN
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('espace-pedia') }}" class="nav-link text-white">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                      Pédiatrie
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('espace-neuro') }}" class="nav-link text-white">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                        Neurologue
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('espace-chr') }}" class="nav-link text-white">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                      Chirurgie
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('espace-neuro-chr') }}" class="nav-link text-white">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                      Neuro-Chirurgie
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('espace-kine') }}" class="nav-link text-white">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                      Kinésithérapie
                    </a>
                  </li>
                </ul>
                <hr>

              </div>

        </div>
        {{-- bloc 2.2 --}}
       <div class="col-8 py-3 px-5" style="background: #F2B988">
        <div class="row">
            <div class="col-5 me-5">
                <div class="card">
                    <div class="card-header fs-4" style="color: #730C02">
                      Médecin Générale
                    </div>
                    <div class="card-body">
                      <p class="card-text">le généraliste prend en charge ses patients dans leur globalité (habitudes, hygiène de vie, antécédents) et les suit ... <i hidden>le plus souvent sur une longue période..</i></p>
                      <a href="#" class="btn btn-primary">Plus d'information</a>
                    </div>
                  </div>
            </div>
            <div class="col-5 ms-5">
                <div class="card">
                    <div class="card-header fs-4" style="color: #730C02">
                        Cardiologie
                    </div>
                    <div class="card-body">
                      <p class="card-text">Le cardiologue est un médecin spécialisé dans les maladies du cœur ou cardio-vasculaires : insuffisance cardiaque, ... <i hidden> hypertension artérielle, infarctus du myocarde, troubles du rythme cardiaque, embolie pulmonaire, problèmes de circulation sanguine…</i></p>
                      <a href="#" class="btn btn-primary">Plus d'information</a>
                    </div>
                  </div>
            </div>

            <div class="col-5 me-5 pt-3">
                <div class="card">
                    <div class="card-header fs-4" style="color: #730C02">
                        Dermatologie
                    </div>
                    <div class="card-body">
                      <p class="card-text">Le dermatologue est le médecin spécialiste de la peau, des ongles et du cuir chevelu. Toutes les affections cutanées...<i hidden>  sont de son ressort : acné, verrues, mais aussi brûlures, IST, cancers… Il peut accomplir par ailleurs des actes chirurgicaux.</i></p>
                      <a href="#" class="btn btn-primary">Plus d'information</a>
                    </div>
                  </div>
            </div>
            <div class="col-5 ms-5 pt-3">
                <div class="card">
                    <div class="card-header fs-4" style="color: #730C02">
                        Urologie
                    </div>
                    <div class="card-body">
                      <p class="card-text">L'Urologue : un spécialiste des troubles de l'appareil uro-génital aux grandes qualités humaines. etc.. <i hidden> L'Urologie, parce qu'elle concerne ...l'appareil urinaire et reproducteur, demande délicatesse, écoute, et mise en confiance des patients</i></p>
                      <a href="#" class="btn btn-primary">Plus d'information</a>
                    </div>
                  </div>
            </div>
           </div>
           <div class="d-flex justify-content-center mt-5" >
            {{ $listes->links("pagination.custom") }}
        </div>
        </div>
        {{-- fin bloc 2.2 --}}
       </div>
</div>
@endsection
