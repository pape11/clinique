<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <div class="container my-5 p-5  " style="">
        <div class="row border-3  table-bordered">
            <div class="col-2" style="padding-top: 15em"> <div class="col text-start"><a href="{{ route('ajout-rendez-vous', $patient->id) }}"><i class="bi bi-arrow-left-circle-fill fs-2" style="color: #F2B988  "></i></a></div></div>
            <div class="col-8 table-responsive">
                <table class="table border-danger table-bordered table-secondary align-middle ">
                    <tr class="p-3">
                        <td>
                            <img src="/images/logo.png" alt="" style="height: 9em">
                        </td>
                        <td colspan="2">
                            <div class=" ps-5" style="font-size: 15px ; font-weight: 700">Médecine Générale et Spécialité - Consultation à Domicile <br>ECG - Echographie Général - Maternité - Gynéco - Analyses - Kinésithérapie et Réeducation fonctionnelle <br> </div>
                            <div class=" ps-5" style="font-size: 13px ; font-weight: 600">
                                <b>Adresse : </b>Yeumbeul, Route de Malika à coté du Centre de Gallé <br>
                                <b>Téléphone : </b> 33 871 28 05 / 77 588 68 42 / 76 303 00 05 <br>
                                <b>Email : </b>Cabinetmedicaleseydijamil@yahoo.com <br>
                                <b>Auth : </b> N° 003219 du 03 Mars 2021 MSAS / DGES / DEPS
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">

                        <div class="text-center my-4 " style="font-size: 15px ; font-weight: 700 ; text-decoration: underline">FICHE PATIENT</div>

                        </th>
                    </tr>
                </table><table class="table border-danger table-bordered table-secondary align-middle ">
                    <tr class="p-3">
                        <td>
                            <b>Prénom : </b>{{ $patient->prenom }}
                        </td>
                        <td>
                            <b>Nom : </b>{{ $patient->nom }}
                        </td>
                        <td>
                            <b>Age : </b>{{ $patient->age }}
                        </td>
                    </tr>
                    <tr class="p-3">
                        <td>
                            <b>Sexe : </b>{{ $patient->sexe }}
                        </td>
                        <td>
                            <b>Adresse : </b>{{ $patient->adresse }}
                        </td>
                        <td>
                            <b>Tel : </b>{{ $patient->telephone }}
                        </td>
                    </tr>
                    <tr class="p-3">
                        <td colspan="3">
                            <b>Date inscription : </b>{{ $patient->created_at->format('d / m / Y') }} <p hidden>{{ $n = 0 }}</p>
                        </td>
                    </tr>
                    @foreach ($consultations as $consult)
                    <tr class="p-3">
                        <td colspan="3">
                        </td>
                    </tr>
                   <tr class="">
                    @if ($consult->motif != 'null')
                    <td colspan="3">
                        <b>Motif de Consultation {{ $n = $n +1 }} :</b> {{ $consult->motif }}
                    </td>
                   @endif

                    </tr>
                    <tr class="">
                        <td class="col-sm-3 col">
                            <b>Température : </b>{{ $consult->temperature ?  $consult->temperature.' °C': 'Néant' }}
                        </td>
                        <td>
                            <b>Tension : </b>{{ $consult->tension ?  $consult->tension.' mmHg': 'Néant' }}
                        </td>
                        <td>
                            <b>Taux de Glycérine : </b>{{ $consult->glycerine ?  $consult->glycerine.' ml': 'Néant'  }}
                        </td>
                    </tr>
                    <tr class="">
                        <td>
                            <b>Poids : </b>{{ $consult->poids ?  $consult->poids.' Kg': 'Néant' }}
                        </td>
                        <td>
                            <b>TDR : </b>{{ $consult->tdr ?  $consult->tdr : 'Néant' }}
                        </td>
                        <td>
                            <b>Teste Grossesse : </b>{{ $consult->test_grossesse }}
                        </td>
                    </tr>
                    <tr class="p-3">
                        <td colspan="3"></td>
                    </tr>
                    @if ($consult->analyse != 'null' && $consult->analyse != Null)
                     <tr class="p-3">
                         <td>
                             <b>Analyses</b> <br>
                         </td>
                         <td colspan="2">
                             {{ $consult->analyse }}
                         </td>
                     </tr>
                    @endif
                    @if ($consult->radio != 'null' && $consult->radio != Null)
                     <tr class="p-3">
                         <td>
                             <b>Radios</b> <br>
                         </td>
                         <td colspan="2">
                             {{ $consult->radio }}
                         </td>
                     </tr>
                    @endif
                    @if ($consult->echo != 'null' && $consult->echo != Null)
                     <tr class="p-3">
                         <td>
                             <b>Echos</b> <br>
                         </td>
                         <td colspan="2">
                             {{ $consult->echo }}
                         </td>
                     </tr>
                    @endif
                   @if ($consult->remarque != 'null')
                    <tr class="p-3">
                        <td colspan="3">
                            <b>Examen clinique</b> <br>
                            {{ $consult->remarque }}
                        </td>
                    </tr>
                   @endif
                   @if ($consult->remarque != 'null')
                    <tr class="p-3">
                        <td  colspan="3">
                            <b>Traitement</b> <br>
                            {{ $consult->traitement }}
                        </td>
                    </tr>
                   @endif
                    @if ($consult->image != "default.png")
                        <tr class="p-3 text-center">
                            <td colspan="3">
                                <b>Resultat d'analyse :</b> <br>
                                <img src="/resultat/{{ $consult->image }}" alt="" srcset="" style="height: 13em; width: 30em">
                            </td>
                        </tr>
                    @endif
                    @if ($consult->image1  != "default.png")
                        <tr class="p-3 text-center">
                            <td colspan="3">
                                <img src="/resultat/{{ $consult->image1 }}" alt="" srcset="" style="height: 13em; width: 30em" >
                            </td>
                        </tr>
                    @endif
                    @if ($consult->image2  != "default.png")
                        <tr class="p-3 text-center">
                            <td colspan="3">
                                <img src="/resultat/{{ $consult->image2 }}" alt="" srcset="" style="height: 13em; width: 30em" >
                            </td>
                        </tr>
                    @endif
                    <tr class="p-3">
                        <td colspan="2" ><b>Suivie par  :</b> {{ $consult->specialite }}</td>
                        <td colspan="" ><b>Consultation fait le : </b>{{ $consult->created_at->format('d/m/Y') }}</td>
                    </tr>
                    <tr class="p-2">
                        @if ($consult->rendez_vous != null)
                            <td colspan="3" ><b>Il/elle a un rendez-vous prévu avec le : </b>{{ $consult->rendez_vous  }}</td>
                        @endif

                    </tr>
                    <tr class="p-3">
                        <td colspan="3" ></td>
                    </tr>
                   @endforeach


                    <tr class="p-3">
                        <td colspan="3"> </td>
                    </tr>
                    <tr class="p-3">
                        <td colspan="3"> </td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="col-2"></div>
    </div>
</body>
</html>
