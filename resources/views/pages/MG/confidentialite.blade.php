@extends('partials.base2')
@section('name')
    <div class="container">
        <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-3 text-start py-2 mt-5">Espace Médecin Général </h2>
        <div class="row">
            <div class="col-5"><a href="{{ route('MG.ajout-patient') }}" class="btn text-light mb-3" style="background: #734E39">Ajouter un patient</a></div>
            <div class="col-7">
                <form action="{{ route('recherche') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-lg-9 ms-4">
                            <input type="text" class="form-control" placeholder="Entrer le prénom du patient" name="patient_id">
                        </div>
                        <div class="col-2">
                            <button class="btn text-light" style="background:  #F2B988">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mb-0" style="border: solid 1px #F2B988">
            <h5 class="card-header alert-warning">Compte Patient</h5>
            <div class="card-body">
                <table class="table table-hover table-striped table-warning">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Prenom</th>
                          <th scope="col">Nom</th>
                          <th scope="col">Adresse</th>
                          <th scope="col">Inscrit le</th>
                          <th scope="col">Statuts</th>
                        </tr>
                      </thead>
                      <tbody class="table-group-divider">
                        @foreach ($patients as $patient)
                            <tr>
                                <th scope="row">{{ $patient->patient_id }}</th>
                                <td>{{ $patient->prenom }}</td>
                                <td>{{ $patient->nom }}</td>
                                <td>{{ $patient->adresse }}</td>
                                <td>{{ $patient->created_at->format('d-m-Y') }}</td>
                                @if ($patient->status == 'false')
                                    <td><a href="{{ route('controle-access', $patient->id) }}" class="btn px-3 text-dark" style="background: #F2F2F2;">Accèes</a></td>
                                @else
                                    <td><a href="{{ route('controle-access', $patient->id) }}" class="btn text-light" style="background: #734E39;">Sécurisé</a></td>
                                @endif
                            </tr>
                        @endforeach
                </table>
                <div class="d-flex justify-content-end mt-3" >
                    {{ $patients->links("pagination.custom") }}
                </div>
            </div>
          </div>
    </div>
@endsection
