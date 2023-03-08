@extends('partials.base2')
@section('name')
    <div class="container">
        <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-3 text-start py-2 mt-5">Espace Médecin Général </h2>
        <div class="row">
            <div class="col-5"><a href="{{ route('MG.ajout-patient') }}" class="btn text-light mb-3" style="background: #734E39">Ajouter un patient</a></div>
            <div class="col-7">
                <form action="{{ route('recherche.tdr') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-lg-9 ms-4">
                            <input type="text" class="form-control" placeholder="Entrer le prénom du patient" name="patient_id">
                        </div>
                        <div class="col-2">
                            <button  class="btn text-light" style="background:  #F2B988">Rechercher</button>
                        </div>
                        <i hidden>{{ $n = 0 }}</i>
                        @foreach ($consultations as $consulation)
                            @if ($consulation->tdr == "Positive")
                                <i hidden>{{ $n++ }}</i>
                            @endif
                        @endforeach
                        @if ($n < 1)
                                <div class="text-start ms-4 my-1" >Désolé mais cette date ne correspond à aucune rendez-vous</div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mb-0" style="border: solid 1px #F2B988">
            <h5 class="card-header alert-warning">Listes des patients dont leur tdr est positive</h5>
            <div class="card-body">
                <table class="table table-hover table-striped table-warning">
                    <thead>
                        <tr>
                          <th scope="col">#Identifiant</th>
                          <th scope="col">Prenom</th>
                          <th scope="col">Nom</th>
                          <th scope="col">Tdr</th>
                          <th scope="col">Adresse</th>
                          <th scope="col">Téléphone</th>
                          <th scope="col">Inscrit le</th>
                          {{-- <th scope="col">Infos</th> --}}
                        </tr>
                      </thead>
                      <tbody class="table-group-divider">
                        @foreach ($consultations as $consulation)
                        @if ($consulation->tdr == "Positive")
                            <tr {{ $n = 0 }}>
                                <th scope="row">{{  $consulation->patient->patient_id }}</th>
                                <td>{{  $consulation->patient->prenom }}</td>
                                <td>{{  $consulation->patient->nom }}</td>
                                <td>{{  $consulation->tdr }}</td>
                                <td>{{  $consulation->patient->adresse }}</td>
                                <td>{{  $consulation->patient->telephone }}</td>
                                <td>{{  $consulation->patient->created_at->format('d-m-Y') }}</td>
                                {{-- <td><a href="{{ route('MG.ajout-rendez-vous', $ $consulation->patient->id) }}" class="btn text-light" style="background: #734E39;">Consultation</a></td> --}}
                            </tr>
                        @endif
                        @endforeach
                </table>
                <div class="d-flex justify-content-end mt-3" >
                    {{ $consultations->links("pagination.custom") }}
                </div>
            </div>
          </div>
    </div>
@endsection
