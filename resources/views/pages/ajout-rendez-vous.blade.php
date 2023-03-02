@extends('partials.base')
@section('name')
    <div class="container">
        <div class="row mt-5">
            @if (Session::has('ok'))
                <div class="alert alert-primary">{{ session::get('ok') }}</div>
            @endif
            @if (Session::has('ok rendez_vous'))
                <div class="alert alert-primary">{{ session::get('ok rendez_vous') }}</div>
            @endif
        </div>
        <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-1 text-center mb-2 ">Page de Consultation </h2>
        <div class="row">
        @if (Auth::User()->specialite == "Médecin Général")
            <div class="col text-start"><a href="{{ route('espace-medecin-generale') }}"><i class="bi bi-arrow-left-circle-fill fs-2" style="color: #F2B988  "></i></a></div>
        @endif
        @if (Auth::User()->specialite == "Cardialogue")
            <div class="col text-start"><a href="{{ route('espace-cardio') }}"><i class="bi bi-arrow-left-circle-fill fs-2" style="color: #F2B988  "></i></a></div>
        @endif
        @if (Auth::User()->specialite == "Diabétologue")
            <div class="col text-start"><a href="{{ route('espace-diabeto') }}"><i class="bi bi-arrow-left-circle-fill fs-2" style="color: #F2B988  "></i></a></div>
        @endif
        @if (Auth::User()->specialite == "Pédiatre")
            <div class="col text-start"><a href="{{ route('espace-pedia') }}"><i class="bi bi-arrow-left-circle-fill fs-2" style="color: #F2B988  "></i></a></div>
        @endif
        @if (Auth::User()->specialite == "Dermatologue")
            <div class="col text-start"><a href="{{ route('espace-derma') }}"><i class="bi bi-arrow-left-circle-fill fs-2" style="color: #F2B988  "></i></a></div>
        @endif
        @if (Auth::User()->specialite == "Urologue")
            <div class="col text-start"><a href="{{ route('espace-uro') }}"><i class="bi bi-arrow-left-circle-fill fs-2" style="color: #F2B988  "></i></a></div>
        @endif
            <div class="col text-end"><a href="{{ route('dossier-medical', $patient->id) }}"><i class="bi bi-arrow-right-circle-fill fs-2" style="color: #F2B988  "></i></a></div>
        </div>
    </div>
        <div class="container-fluid py-5 " style="background: #F2F2F2">
            <div class="container">
                <div class="row">
                    <div class="col-8 ms-3"><a href="{{ route('dossier-medical', $patient->id) }}" class="btn text-light mb-3" style="background: #734E39">Voir le dossier médical du patient</a></div>
                    <div class="col"><b>Patient : </b>{{ $patient->prenom }} {{ $patient->nom }}</div>
                </div>
            <div class="row gx-5">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    {{-- <div class="mb-4">
                        <h5 class="d-inline-block  text-uppercase border-bottom border-5">Rendez-vous</h5>
                        <h1 class="display-6">Soyez rassurer nous avons les meilleurs médecins</h1>
                    </div>
                    <a class="btn btn-dark rounded-pill py-3 px-2 me-3" href="">Trouver mon médecin</a>
                    <img src="images/image4.png" alt="" height="180"> --}}
                    <div class=" text-start rounded p-5" style="background: #F2B988">

                        <h1 class="mb-4 text-light">Consultation</h1>
                        <form action="{{ route('save-consultation') }}" name="add_name" id="add_name" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-3 col-sm-4">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre Température" name="temperature"
                                        style="height: 55px;">
                                </div>
                                <div class="col-3 col-sm-4">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Votre Tension" name="tension"
                                    style="height: 55px;">
                                </div>
                                <div class="col-3 col-sm-4">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Taux de Glycemine" name="glycerine"
                                    style="height: 55px;">
                                </div>
                                <div class="col-3 col-sm-4">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Poids" name="poids"
                                    style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-4">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Plainte et Symptomes" name="motif"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-4">
                                    <select class="form-select bg-light" aria-label="Default select example" name="test_grossesse" style="height: 55px;">>
                                        <option selected value="Neant">Vous etes enceinte ?</option>
                                        <option value="Enceinte">OUI</option>
                                        <option value="Neant">NON</option>
                                      </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light" aria-label="Default select example" name="tdr" style="height: 55px;">>
                                        <option selected>Veuillez préciser son TDR</option>
                                        <option value="Positive">Positive</option>
                                        <option value="Négative">Négative</option>
                                      </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="row">
                                        <div class="col-10"> <input type="file" class="form-control bg-light border-0 name_list"  name="image"
                                            style="height: 34px;"></div>
                                        <div class="col-1"> <button type="button" class="btn text-light" name="add" id="plus_de_champs" style="background: #734E39">+</button></div>
                                    </div>
                                    <label class="form-check-label text-light fs-6" for="flexSwitchCheckDefault">Veuillez le photo de l'analyse </label>
                                </div>
                                <div class="col-12 col-sm-12" style="margin: 0" id="logo"></div>
                                <div class="col-12 col-sm-12 text-light">
                                     {{-- partie analyse --}}
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="champs_analyse">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Analyse</label>
                                    </div>
                                    {{-- recupération formulaire analyse--}}
                                    <div class="row" id="logo1"></div>
                                    {{-- partie radio --}}
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="champs_radio">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Radio</label>
                                     </div>
                                    {{-- recupération formulaire radio--}}
                                    <div class="row" id="logo2"></div>
                                   {{-- partie echo --}}
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="champs_echo">
                                        <label class="form-check-label" for="flexSwitchCheckDisabled">Echo</label>
                                    </div>
                                    {{-- recupération formulaire radio--}}
                                    <div class="row" id="logo3"></div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="remarque" id="floatingTextarea2" style="height: 150px"></textarea>
                                        <label for="floatingInputInvalid">Resultat d'analyse / Diagnostic</label>
                                      </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="traitement" id="floatingTextarea2" style="height: 150px"></textarea>
                                        <input hidden type="text" class="form-control" id="floatingInputInvalid" placeholder="" name="patient_id" value="{{ $patient->id }}">
                                        <input hidden type="text" class="form-control" id="floatingInputInvalid" placeholder="" name="specialite" value="{{ Auth::User()->specialite }} {{ Auth::User()->prenom }} {{ Auth::User()->nom }}">
                                        <label for="floatingInputInvalid">Traitement</label>
                                      </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn w-100 py-3 text-light" style="background: #734E39" type="submit">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class=" text-start rounded p-5" style="background: #F2B988">

                        <h1 class="mb-4 text-light fs-4">Rendez-vous</h1>
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
                                        <input hidden type="text" class="form-control" id="floatingInputInvalid" placeholder="" name="patient_id" value="{{ $patient->id }}">
                                        <input hidden type="text" class="form-control" id="floatingInputInvalid" placeholder="" name="nom_complet" value="{{ $patient->prenom }} {{ $patient->nom }}">
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
                </div>
            </div>
            </div>
        </div>
        <script>
            // Partie image
            var max_fields = 3;
            var wrapper = $(".input_fields_wrap");
            var add_button = $(".add_field_button");
            var x = 1;
            var div = "<div>";
            $("#plus_de_champs").click(function (event) {
              event.preventDefault();
              if (x <= max_fields) {
                $(div)
                  .append('<div class="row"><div class="col-11 mb-3"> <input id="remove" type="file" class="form-control bg-light border-0"  name="img'+x+'"style="height: 34px;"></div><div class="col-1"> <button type="button" class="btn text-light"  style="background: #730C02"><a href="" class="remove_field">x</a></button></div></div>')
                  .appendTo("#logo");
                  x++;
              }

            });
            $("#remove").on('click', '.remove_field', function (e) {
              e.preventDefault();
              $(this).parent('#remove').remove();
              x--;
            });

            // Partie analyse
            var max_fields = 2;
            var wrapper = $(".input_fields_wrap");
            var add_button = $(".add_field_button");
            var x1 = 1;
            var div = "<div>";
            $("#champs_analyse").click(function (event) {
              event.preventDefault();
              if (x1 < 2) {
                $(div)
                  .append('<table class="table text-light ms-3 table-hover table-striped"><tr class="text-light"><td class="col-12 col-sm-4 ms-3"><div class="form-check"><input class="form-check-input" type="checkbox" value="GLYCEMIE" name="analyse[]" ><label class="form-check-label text-light" for="flexCheckDisabled"> GLYCEMIE</label></div></td><td class="col-12 col-sm-4 ms-3"><div class="form-check"><input class="form-check-input" type="checkbox" value="NFS" name="analyse[]" ><label class="form-check-label text-light" for="flexCheckDisabled">NFS</label></div></td><td class="col-12 col-sm-4 ms-3"><div class="form-check"> <input class="form-check-input" type="checkbox" value="TEST D-EMMAL" name="analyse[]" ><label class="form-check-label text-light" for="flexCheckDisabled">TEST D-EMMAL</label></div></td></tr> <tr><td class="col-12 col-sm-4 ms-3"><div class="form-check"><input class="form-check-input" type="checkbox" value="CREATININEMIE" name="analyse[]" ><label class="form-check-label text-light" for="flexCheckDisabled">CREATININEMIE</label></div></td><td ><div class="form-check"><input class="form-check-input" type="checkbox" value="VS" name="analyse[]" ><label class="form-check-label text-light" for="flexCheckDisabled"> VS</label></div></td><td><div class="form-check"><input class="form-check-input" type="checkbox" value="TRANSAMINASES" name="analyse[]" ><label class="form-check-label text-light" for="flexCheckDisabled">TRANSAMINASES </label></div></td></tr><tr><td class="col-12 col-sm-11 ms-3 mt-2" colspan="3"><input type="text" class="form-control bg-light border-0" placeholder="Autres analyse" name="analyse[]" style="height: 55px;"></td></tr></table>').appendTo("#logo1");
                  x1++;
              }

            });

            // Partie radio
            var max_fields = 2;
            var wrapper = $(".input_fields_wrap");
            var add_button = $(".add_field_button");
            var x2 = 1;
            var div = "<div>";
            $("#champs_radio").click(function (event) {
              event.preventDefault();
              if (x2 < 2) {
                $(div)
                  .append('<table class="table text-light ms-3 table-hover table-striped"><tr><td class="col-12 col-sm-4 ms-3"><div class="form-check"><input class="form-check-input" type="checkbox" value="Radio générale" id="flexCheckDisabled" name="radio[]" ><label class="form-check-label text-light" for="flexCheckDisabled">Radio générale</label></div></td><td class="col-12 col-sm-4"><div class="form-check"><input class="form-check-input" type="checkbox" value="Radio digestive" id="flexCheckDisabled" name="radio[]" ><label class="form-check-label text-light"for="flexCheckDisabled">Radio digestive</label></div></td><td class="col-12 col-sm-4"><div class="form-check"><input class="form-check-input" type="checkbox" value="Radio dentaire" id="flexCheckDisabled" name="radio[]" ><label class="form-check-label text-light" for="flexCheckDisabled"> Radio dentaire</label></div></td></tr><tr><td class="col-12 col-sm-4"><div class="form-check"><input class="form-check-input" type="checkbox" value="Radio Uroscanner" id="flexCheckDisabled" name="radio[]" ><label class="form-check-label text-light" for="flexCheckDisabled">Radio Uroscanner</label></div></td><td><div class="form-check"><input class="form-check-input" type="checkbox" value="Radio urinaire" id="flexCheckDisabled" name="radio[]" ><label class="form-check-label text-light" for="flexCheckDisabled">Radio urinaire</label></div></td><td><div class="form-check"><input class="form-check-input" type="checkbox" value="Radio ORL" id="flexCheckDisabled" name="radio[]" ><label class="form-check-label text-light" for="flexCheckDisabled">Radio ORL </label><tr></td ><td class="col-12 col-sm-11 ms-3 my-2" colspan="3"><input type="text" class="form-control bg-light border-0" placeholder="Autres radios" name="radio[]" style="height: 55px;"></td></tr> </table>').appendTo("#logo2");
                  x2++;
              }

            });

            // Partie echo
            var max_fields = 2;
            var wrapper = $(".input_fields_wrap");
            var add_button = $(".add_field_button");
            var x3 = 1;
            var div = "<div>";
            $("#champs_echo").click(function (event) {
              event.preventDefault();
              if (x3 < 2) {
                $(div)
                  .append(' <table class="table text-light ms-3 table-hover table-striped"><tr><td class="col-12 col-sm-4 ms-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="echo[]" value="Echographie générale" id="flexCheckDisabled" ><label class="form-check-label text-light" for="flexCheckDisabled">Echographie générale </label></div></td><td class="col-12 col-sm-4"><div class="form-check"><input class="form-check-input" type="checkbox" name="echo[]" value="Echographie urinaire" id="flexCheckDisabled" ><label class="form-check-label text-light" for="flexCheckDisabled">Echographie urinaire</label></div></td><td class="col-12 col-sm-4"><div class="form-check"><input class="form-check-input" type="checkbox" name="echo[]" value="Echo gynécologique" id="flexCheckDisabled" ><label class="form-check-label text-light" for="flexCheckDisabled"> Echo gynécologique</label></div></td></tr><tr><td class="col-12 col-sm-4"><div class="form-check"><input class="form-check-input" type="checkbox" name="echo[]" value=" Echo ostéoarticulaire" id="flexCheckDisabled" ><label class="form-check-label text-light" for="flexCheckDisabled"> Echo ostéoarticulaire  </label></div></td><td  class="col-12 col-sm-4"><div class="form-check"> <input class="form-check-input" type="checkbox" name="echo[]" value="Echo mammaire" id="flexCheckDisabled" ><label class="form-check-label text-light" for="flexCheckDisabled">Echo mammaire</label></div></td><td  class="col-12 col-sm-4"> <div class="form-check"> <input class="form-check-input" type="checkbox" name="echo[]" value="Echo obstétricale" id="flexCheckDisabled" > <label class="form-check-label text-light" for="flexCheckDisabled">Echo obstétricale</label></div></td></tr><tr><td class="col-12 col-sm-11 ms-3 mt-2" colspan="3"><input type="text" class="form-control bg-light border-0" placeholder="Autres échos" name="echo[]" style="height: 55px;"></td></tr></table>').appendTo("#logo3");
                  x3++;
              }

            });

          </script>
@endsection
