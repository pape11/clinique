@extends('partials.base2')
@section('name')
    <div class="container">
        <div class="row mt-5">
            @if (Session::has('ok'))
                <div class="alert alert-primary">{{ session::get('ok') }}</div>
            @endif
        </div>
        <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-3 text-start py-2 ms-4 mt-2">Ajouter un patient </h2>
    </div>
        <div class="container">
            <div class="container">
                <hr class="mt-1">
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="mb-3">
                        <h5 class="d-inline-block  text-uppercase border-bottom border-5">Rendez-vous</h5>
                        <h1 class="display-6">Soyez rassurer nous avons les meilleurs médecins</h1>
                    </div>
                    <img src="images/image4.png" alt="" height="200">
                </div>
                <div class="col-lg-6">
                    <div class=" text-center rounded pt-2 p-4" style="background: #F2B988">

                        <h1 class="fs-3 text-start py-2 mt-2 text-light">Ajout de patient</h1>
                        <form action="{{ route('ajout-patient') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre Prénom" name="prenom" required
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre Nom" name="nom" required
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre Age" name="age" required
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre Adresse" name="adresse" required
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0 p-3 @error('password') is-invalid @enderror" name="sexe" aria-label="Default select example">
                                        <option selected value="Homme">Homme</option>
                                        <option value="Femme">Femme</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre numéro de Téléphone" name="telephone" required
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name ="rv" id="flexCheckDefault">
                                        <label class="form-check-label text-light" for="flexCheckDefault">
                                          Est ce que c'est pour une consultation ?
                                        </label>
                                      </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn w-100 py-3 text-light" style="background: #734E39" type="submit">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
@endsection
