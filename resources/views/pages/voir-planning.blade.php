@extends('partials.base')
@section('name')
    <div class="container">
        <h2 style="color: #730C02 ; text-decoration: underline;" class="fs-1 text-center my-5">Emploi du temps </h2>

       <div class="row mb-5">
        <div class="col-1"></div>
        <div class="col-10 border-3 p-4" style="border: #730C02 solid"> <embed src="/fichiers/{{ $planning->fichier }}" width="895" height=500 type='application/pdf'/></div>
        <div class="col-1"></div>
       </div>
    </div>
@endsection
