@extends('partials.base')

@section('name')
<div class="container-fluid">
    <div class="row justify-content-center py-5" style="background: #F2F2F2">
        <div class="col-5" style="height: 20em ;">
            <img src="images/image3.png" class="ms-5 mb-2" width="380px" alt="">
            <p class="fs-4" style="color: #730C02">Inscrivez-vous en précisant votre spécialité</p>
        </div>
        {{-- --------------  --}}
        <div class="col-md-6">
            <div class="card" style="height: 28em">
                <div class="card-header text-center fs-4" style="color: #730C02">{{ __('Inscription') }}</div>

                <div class="card-body py-3">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col mb-3">
                                <label for="prenom" class="ms-5 col-9 col-form-label ps-4 text-md-start fs-5" style="color: #730C02">{{ __('Prénom') }}</label>

                                <div class="col-md-10 ms-5 ps-4">
                                    <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" >

                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3">
                                <label for="nom" class="col-9 col-form-label ps-4 text-md-start fs-5" style="color: #730C02">{{ __('Nom') }}</label>

                                <div class="col-md-10 ps-4">
                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" >

                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="carte" class="ms-5 col-9 col-form-label ps-4 text-md-start fs-5" style="color: #730C02">{{ __('Email') }}</label>

                                <div class="col-md-10 ms-5 ps-4">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3">
                                <label for="serie" class="col-9 col-form-label ps-4 text-md-start fs-5" style="color: #730C02">{{ __('Spécialité') }}</label>

                                <div class="col-md-10 ps-4">
                                    <select class="form-select bg-light @error('specialite') is-invalid @enderror" name="specialite">
                                        <option ></option>
                                        <option >Choisissez votre spécialité</option>
                                        <option value="DG">DG</option>
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
                                        <option value="Sécrétaire">Sécrétaire</option>
                                        <option value="Autre">Autre</option>
                                      </select>
                                    @error('specialite')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="password" class="ms-5 col-9 col-form-label ps-4 text-md-start fs-5 " style="color: #730C02">{{ __('Mot de passe') }}</label>

                                <div class="col-md-10 ms-5 ps-4">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col mb-3">
                                <label for="password-confirm" class="col-9 col-form-label ps-4 text-md-start fs-5"style="color: #730C02" >{{ __('Confirmation') }}</label>

                                <div class="col-md-10  ps-4">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-9 ms-5 ps-5 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('S\'inscrire') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
