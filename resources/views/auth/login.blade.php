@extends('partials.base')

@section('name')
<div class="container-fluid py-5  " style="background: #F2B988 ; margin: 0">
    <div class="container">
        @if (Session::has('ACCESS'))
            <div class="alert alert-danger">
                {{ Session::get('ACCESS') }}
            </div>
        @endif
        @if (Session::has('ACCES'))
            <div class="alert alert-danger">
                {{ Session::get('ACCES') }}
            </div>
        @endif
    </div>
    <div class="row justify-content-center py-5">
        <div class="col-5" style="height: 20em ;">
            <img src="images/image2.png" class="ms-5 mb-2" width="380px" alt="">
            <p class="fs-4 text-light">Connectez-vous en précisant votre spécialité</p>
        </div>
        {{-- --------------  --}}
        <div class="col-md-5">
            <div class="card mb-5">
                <div class="card-header text-center fs-3" style="color: #730C02">{{ __('Authentification') }}</div>

                <div class="card-body py-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="carte" class="ms-5 col-9 col-form-label ps-4 text-md-start fs-5" style="color: #730C02">{{ __('Email') }}</label>

                            <div class="col-md-9 ms-5 ps-4">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-start ps-5 ms-4  fs-5" style="color: #730C02">{{ __('Mot de passe') }}</label>

                            <div class="col-md-9 ms-5 ps-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 ms-5 ps-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Se Connecter') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
