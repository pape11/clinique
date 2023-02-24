@extends('partials.base')
@section('name')
    <div class="container">
        <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-1 text-center my-5">Listes des patients </h2>
        <a href="{{ route('ajout-patient') }}" class="btn text-light mb-3" style="background: #734E39">Ajouter un patient</a>
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
                  <th scope="col " class="text-center" colspan="3">Option</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                @foreach ($patients as $patient)
                <tr>
                    <th scope="row">{{ $patient->id }}</th>
                    <td>{{ $patient->prenom }}</td>
                    <td>{{ $patient->nom }}</td>
                    <td>{{ $patient->adresse }}</td>
                    <td>{{ $patient->created_at->format('d-m-Y') }}</td>
                    <td class="text-center"><a href="{{ route('rendez-vous', $patient->id) }}" class="btn text-light " style="background: #F2B988;">Rendez-vous</a></td>
                    <td class="text-center"><a href="{{ route('modifier-patien', $patient->id) }}" class="btn text-light " style="background: #734E39;">Modifier</a></td>
                    <td class="text-center"><a href="{{ route('supprimer-patient', $patient->id) }}" class="btn text-light" style="background: #730C02;">Supprimer</a></td>
                  </tr>
                @endforeach
        </table>
        <div class="d-flex justify-content-center mt-5" >
            {{ $patients->links("pagination.custom") }}
        </div>
    </div>
@endsection
