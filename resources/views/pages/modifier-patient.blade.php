@extends('partials.base')
@section('name')
    <div class="container">
        <div class="row mt-5">
            @if (Session::has('ok'))
                <div class="alert alert-primary">{{ session::get('ok') }}</div>
                <script>
                    alert('Patient sauvegardé avec succèes')
                </script>
            @endif
        </div>
        <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-1 text-center mb-5">Modifier les données du patient </h2>
    </div>
        <div class="container-fluid py-5 " style="background: #F2F2F2">
            <div class="container">
                <a href="{{ route('listes-patients') }}" class="btn text-light mb-2" style="background: #734E39">Information du patient</a> <hr>
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h5 class="d-inline-block  text-uppercase border-bottom border-5">Rendez-vous</h5>
                        <h1 class="display-6">Soyez rassurer nous avons les meilleurs médecins</h1>
                    </div>
                    <a class="btn btn-dark rounded-pill py-3 px-2 me-3" href="">Trouver mon médecin</a>
                    <img src="images/image4.png" alt="" height="180">
                </div>
                <div class="col-lg-6">
                    <div class=" text-center rounded p-5" style="background: #F2B988">

                        <h1 class="mb-4 text-light">Modifier les données du patient</h1>
                        <form action="{{ route('modifier-patient') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre Prénom" name="prenom" required value="{{ $patient->prenom }}"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre Nom" name="nom" required value="{{ $patient->nom }}"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre Age" name="age" required value="{{ $patient->age }}"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre Adresse" name="adresse" required value="{{ $patient->adresse }}"
                                        style="height: 55px;">
                                    <input hidden type="text" class="form-control bg-light border-0" placeholder="Votre Adresse" name="id" required value="{{ $patient->id }}"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0 p-3 @error('password') is-invalid @enderror" name="sexe" aria-label="Default select example">
                                        @if ($patient->sexe == "Homme")
                                            <option selected value="Homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                        @else
                                            <option value="Femme">Femme</option>
                                            <option selected value="Homme">Homme</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre numéro de Téléphone" name="telephone" required value="{{ $patient->telephone }}"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <button class="btn w-100 py-3 text-light" style="background: #734E39" type="submit">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
@endsection
