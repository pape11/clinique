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
            @if (Session::has('ok rendez_vous'))
                <div class="alert alert-primary">{{ session::get('ok rendez_vous') }}</div>
            @endif
        </div>
        <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-1 text-center mb-5">Infos du rendez-vous </h2>
    </div>
        <div class="container mb-5 py-5 " style="background: url(https://previews.123rf.com/images/maxximmm/maxximmm1308/maxximmm130800037/21555453-seamless-texture-de-la-peinture-marron-beige-vieux-fer-grunge-sale-m%C3%A9tal-rouille-goutte-%C3%A0-goutte-gru.jpg); background-size: cover">
            <div class="container" >
                <a href="{{ route('listes-patients') }}" class="btn text-light mb-5 px-5" style="background: #734E39">Retourner dans la liste des patients</a>
            <div class="row p-4 m-2 " style="background: #F2F2F2 ; opacity: 0.9">
                <div class="col-lg-6 mb-5  mb-lg-0" style="background: #; background-size: 1em">
                    <h3 class="h3">Rendez-vous</h3>
                    <form action="{{ route('save-rendez-vous') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-12">
                                    <select class="form-select bg-light @error('specialite') is-invalid @enderror" name="specialite">
                                        <option >Choisissez votre spécialité</option>
                                        <option value="Médecin Général">Médecin Général</option>
                                        <option value="Cardialogue">Cardialogue</option>
                                        <option value="Dermatologue">Dermatologue</option>
                                        <option value="Urologue">Urologue</option>
                                        <option value="Diabétologue">Diabétologue</option>
                                        <option value="ORL">ORL</option>
                                        <option value="Gynécologue">Gynécologue</option>
                                        <option value="CPN">CPN</option>
                                        <option value="Pédiatre">Pédiatre</option>
                                        <option value="Kinésithéape">Kinésithéape</option>
                                        <option value="Autre">Autre</option>
                                      </select>
                                        <input hidden type="text" class="form-control" id="floatingInputInvalid" placeholder="" name="nom_complet" value="{{ $patient->prenom }} {{ $patient->nom }}">
                                        <input hidden type="text" class="form-control" id="floatingInputInvalid" placeholder="" name="patient_id" value="{{ $patient->id }}">
                                      </div>
                                <div class="col-12 col-sm-12">
                                    <input type="date" class="form-control bg-light border-0" placeholder="Date prochaine rendez-vous" name="rendez_vous"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <button class="btn w-100 py-3 text-light" style="background: #734E39" type="submit">Enregistrer</button>
                                </div>
                            </div>
                        </form>

                </div>
                <div class="col-lg-6 ">
                    <div class=" rounded p-2 px-3 " style="background: #F2B988">
                        <h3 class="h3">Données du patient</h3>
                        <div class="row mb-3">
                            <div class="col-6"><div class=""><b>Prénom  : </b> {{ $patient->prenom }}</div></div>
                            <div class="col"><div class=""><b>Nom  : </b> {{ $patient->nom }}</div></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6"><div class=""><b>Adresse  : </b> {{ $patient->adresse }}</div></div>
                            <div class="col"><div class=""><b>Age  : </b> {{ $patient->age }}</div></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6"><div class=""><b>Sexe  : </b> {{ $patient->sexe }}</div></div>
                            <div class="col"><div class=""><b>Téléphone  : </b> {{ $patient->telephone }}</div></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12"> <div class="col-9"><a href="{{ route('dossier-medical', $patient->id) }}" class="btn text-light" style="background: #734E39">Voir son dossier médical</a></div></div>
                        </div>
                    </div>
                </div>
                @if ($count->count() > 0 )
                <div class="row ms-1 ">
                    <div class="rounded p-2 px-3 mt-3" style="background: #F2B988">
                        <h3 class="h6">Il avait un rendez vous avec
                        @foreach ($rendez_vous as $item)
                            {{ $item->specialite }}
                        @endforeach
                    </h3>
                    </div>
                </div>
                @endif
            </div>
            </div>
        </div>
@endsection
