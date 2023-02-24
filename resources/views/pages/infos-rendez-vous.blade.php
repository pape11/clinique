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
        <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-1 text-center mb-5">Infos du rendez-vous </h2>
    </div>
        <div class="container mb-5 py-5 " style="background: url(https://previews.123rf.com/images/maxximmm/maxximmm1308/maxximmm130800037/21555453-seamless-texture-de-la-peinture-marron-beige-vieux-fer-grunge-sale-m%C3%A9tal-rouille-goutte-%C3%A0-goutte-gru.jpg); background-size: cover">
            <div class="container" >
                <a href="{{ route('liste-rendez-vous') }}" class="btn text-light mb-5 px-5" style="background: #734E39">Retourner dans la liste des rendez-vous</a>
            <div class="row p-4 m-2 " style="background: #F2F2F2 ; opacity: 0.9">
                <div class="col-lg-6 mb-5  mb-lg-0" style="background: #; background-size: 1em">
                    <h3 class="h3">Infos</h3>
                    <div class=""><b>Prise en charge par  : </b> {{ $rendez_vous->nom_complet }}</div>
                    <div class=""><b>Médecin : </b> {{ $rendez_vous->specialite }}</div>
                    <div class=""><b>Ce rendez-vous a été prise le : </b> {{ $rendez_vous->created_at->format('d / m / Y') }}</div>
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
            </div>
            </div>
        </div>
@endsection
