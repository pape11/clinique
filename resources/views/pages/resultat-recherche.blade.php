@extends('partials.base')
@section('name')
    <div class="container">
        <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-1 text-center my-5">La liste de nos rendez-vous </h2>
        <div class="row">
            <div class="col-9">
                <form action="{{ route('recherche-rendez-vous') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-lg-9 mb-3">
                            <input type="date" class="form-control" placeholder="" name="date">
                            <label for="">Entrer la date du rendez-vous que vous voulez rechercher</label>
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
                                  <th scope="col">Date Rendez-vous</th>
                                  <th scope="col " class="text-center" colspan="2">Option</th>
                                </tr>
                              </thead>
                              <tbody class="table-group-divider">
                                @foreach ($rendez_vous as $patient)
                                <tr>
                                    <th scope="row">{{ $patient->id }}</th>
                                    <td>{{ $patient->nom_complet }}</td>
                                    <td>{{ $patient->specialite }}</td>
                                    <td>{{ $patient->rendez_vous }}</td>
                                    <td class="text-center"><a href="{{ route('infos-rendez-vous', $patient->id) }}" class="btn text-light" style="background: #bf836082;">Infos</a></td>
                                    <td class="text-center"><a href="" class="btn text-light" style="background: #BF8360;">Modifier</a></td>
                                  </tr>
                                @endforeach
                                @if ($total->count() < 1)
                                    <tr>
                                        <th scope="row" class="text-center p-5" colspan="5">Désolé mais cette date ne correspond à aucune rendez-vous</th>
                                    </tr>
                                @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
