@extends('partials.base')
@section('name')
    <div class="container">
        <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-1 text-center my-5">Espace Médecin Général </h2>
        <div class="row">
            <div class="col-5"><a href="{{ route('ajout-patient') }}" class="btn text-light mb-3" style="background: #734E39">Ajouter un patient</a></div>
            <div class="col-7">
                <form action="{{ route('recherche') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-lg-9   ms-4">
                            <input type="text" class="form-control" placeholder="Entrer le prénom du patient" name="prenom">
                        </div>
                        <div class="col-2">
                            <button class="btn btn-success">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-hover table-striped table-warning">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Prenom</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Adresse</th>
                  <th scope="col">Inscrit le</th>
                  <th scope="col">Infos</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                @foreach ($patients as $patient)
                    @if ($patient->etat == "false")
                        @if ($patient->rv == "true")
                        <tr>
                                <th scope="row">{{ $patient->id }}</th>
                                <td>{{ $patient->prenom }}</td>
                                <td>{{ $patient->nom }}</td>
                                <td>{{ $patient->adresse }}</td>
                                <td>{{ $patient->created_at->format('d-m-Y') }}</td>
                                <td><a href="{{ route('ajout-rendez-vous', $patient->id) }}" class="btn text-light" style="background: #734E39;">Consultation</a></td>
                        </tr>
                        @endif
                    @endif
                @endforeach
        </table>
        <div class="d-flex justify-content-center mt-5" >
            {{ $patients->links("pagination.custom") }}
        </div>
    </div>
@endsection
