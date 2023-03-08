@extends('partials.base2')
@section('name')
    <div class="container">
        <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-3 text-start py-2 mt-5">Espace Médecin Général </h2>
        <div class="row">
            @if (Session::has('non'))
                <div class="alert alert-primary  mt-1">{{ session::get('non') }}</div>
            @endif
        </div>
    </div>
    <div class="container">
        <section class="alert-warning">
            <div class="container py-3">
              <div class="row d-flex justify-content-center align-items-center h-90">
                <div class="col col-xl-10">
                  <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                      <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="images/image2.png"
                          alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                      </div>
                      <div class="col-md-6 col-lg-7 d-flex align-items-center alert-warning">
                        <div class="card-body p-4 p-lg-5 text-black">

                          <form action="{{ route('connexion-dossier') }}"  method="POST">
                            @csrf
                            <h5 class="fw-normal fs-6 mb-3 pb-3" style="letter-spacing: 1px;">Entrer les informations afin d'accéder dans ce dossier</h5>

                            <div class="form-outline mb-3">
                              <input type="text" placeholder="Entrer le mot clé" class="form-control fs-6 form-control-lg" name="mot_cle" />
                              <label class="form-label" for="form2Example17">Mot clé</label>
                            </div>

                            <div class="form-outline mb-3">
                              <input type="text" placeholder="Entrer le mot de passe correspondant " class="form-control fs-6 form-control-lg" name="mot_passe" />
                              <label class="form-label" for="form2Example27">Mot de passe</label>
                            </div>

                            <div class="pt-1 mb-4">
                              <button class="btn btn-xl text-light btn-block"style="background:  #F2B988">Soummettre</button>
                            </div>
                          </form>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </div>
@endsection
