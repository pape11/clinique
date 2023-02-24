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
       @livewire('filtre',['categories' => $categories, 'total' => $total])
    </div>
@endsection
