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
        <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-1 text-center mb-5">La liste de nos emplois du temps </h2>
    </div>
        <div class="container-fluid py-5 " style="background: #F2F2F2">
            <div class="container">
             <hr>
            <div class="row gx-5">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="alert alert-warning" >
                        <table class="table table-hover table-striped table-warning">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom complet</th>
                                    <th scope="col">Spécialité</th>
                                    <th scope="col">Enregistrer le</th>
                                    <th scope="col " class="text-center" colspan="2">Infos</th>
                                  </tr>
                              </thead>
                              <tbody class="table-group-divider" style="font-style: normal ">
                                @if ($planning->count() > 0)
                                    @foreach ($planning as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->nom_complet }}</td>
                                            <td>{{ $item->specialite }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <th class="text-center" colspan="2"><a href="{{ route('voir-emploi-temps', $item->id) }}" class="btn text-light" style="background: #734E39 ">Consulter</a></th>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th scope="row" class="text-center p-5" colspan="5">Désolé mais aucune emploi du temps n'est encore sauvegardé !!</th>
                                    </tr>
                                @endif

                              </tbody>
                        </table>
                    </div>
                   <div class="row text-center">
                        <div class="col-2 me-5"></div>
                        <div class="col-6">
                            <img src="images/image4.png" alt="" height="180" class="">
                        </div>
                   </div>
                </div>
                <div class="col-lg-4">
                    <div class=" text-center rounded p-5" style="background: #F2B988">

                        <h2 class="mb-4 text-light">Nouveau emploi du temps</h2>
                        <form action="{{ route('ajout-emploi-temps') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-12">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre spécialite" name="specialite" value="{{ Auth::User()->specialite }}" required
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-12">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre nom complet" name="nom_complet" value="{{ Auth::User()->prenom }} {{ Auth::User()->nom }} " required
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-12">
                                    <input type="file" class="form-control bg-light border-0" name="fichier" required
                                        style="height: 35px;">
                                    <label for="" class="text-light">Entrer le nouveau emploi du temps</label>
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
