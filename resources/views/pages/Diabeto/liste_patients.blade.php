@extends('partials.base')
@section('name')
    <div class="container">
        <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-1 text-center my-5">La liste de nos rendez-vous Diabeto </h2>
        <div class="row">
            <div class="col-9">
                <form action="{{ route('recherche-cardio') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-lg-9 mb-3">
                            <input type="text" class="form-control" placeholder="Le prénom du patient svp" name="prenom">
                            <label for="">Entrer le prenom du patient que vous voulez rechercher</label>
                        </div>
                        <div class="col-2">
                            <button class="btn alert-warning" style="">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><hr>
    </div>
    <div class="container">
        <div>
            <div class="row mb-5">
                <div class="col-2 me-5 ms-3 p-2  py-4 alert alert-warning">
                    <div class="fs-2 ps-2 pb-2"><b>Salut</b></div>
                    <div class="fs-6 ps-2"><b>{{ Auth::User()->prenom }} {{ Auth::User()->nom }}</b></div>
                    <img src="images/image2.png" alt="" srcset="" width="170">
                    <b><hr><hr><hr><hr></b>
                </div>
                <div class="col-9 ms-4">
                    <div class="alert alert-warning" style="background: ">
                        <table class="table table-hover table-striped table-warning">
                            <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Nom complet</th>
                                  <th scope="col">Spécialité</th>
                                  <th scope="col">Rendez-vous Prise le </th>
                                  <th scope="col ">Option</th>
                                </tr>
                              </thead>
                              <div hidden>{{ $n = 0  }}</div>
                              <tbody class="table-group-divider">
                                @foreach ($rendez_vous as $patient)
                                    @if ($patient->specialite == "Diabétologue")
                                        <tr>
                                            <th scope="row">{{ $patient->id }}</th>
                                            <td>{{ $patient->nom_complet }}</td>
                                            <td>{{ $patient->specialite }}</td>
                                            <td>{{$patient->created_at->format('d / m /Y') }}</td>
                                            <td><a href="{{ route('ajout-rendez-vous', $patient->patient_id) }}" class="btn text-light" style="background: #734E39;">Consultation</a></td>
                                            <div hidden>{{ $n = 1  }}</div>
                                        </tr>
                                    @endif
                                @endforeach
                                @if ($rendez_vous->count() < 1 || $n < 1)
                                    <tr>
                                        <th scope="row" class="text-center p-5" colspan="5">Désolé mais vous n'avez pas de rendez-vous</th>
                                    </tr>
                                @endif
                        </table>
                        {{-- <div class="d-flex justify-content-center mt-5" >
                            {{ $rendez_vous->links("pagination.custom") }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
