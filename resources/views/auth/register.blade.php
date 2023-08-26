@extends('layouts.guest')

@section('title', 'Créer un compte')

@section('content')
    <section class="bg-primary py-5">
        <div class="row">
            <div class="col-md-10 mx-auto bg-white rounded">
                <div class="row align-items-center">
                    <div class="col-md-6 col-12">
                        <div class="container p-5">
                            <h1 class="mb-5">Créer un compte</h1>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="first_name">Prénom</label>

                                        <input id="first_name" type="text"
                                            class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                            value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name">Nom de famille</label>

                                        <input id="last_name" type="text"
                                            class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                            value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="email">{{ __('Email Address') }}</label>

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="password">{{ __('Password') }}</label>

                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check"><input type="checkbox" id="registration_form_agreeTerms"
                                            name="registration_form[agreeTerms]" required="required"
                                            class="form-check-input" value="1">
                                        <label class="form-check-label required" for="registration_form_agreeTerms">
                                            J'accepte les <a href="{{ route('conditions_utilisation') }}">conditions générales d'utilisations.</a>
                                        </label>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div classm="col">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <a href="{{ route('login') }}" class="pt-3">J'ai déjà un compte</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 p-5">
                        <img src="https://www.invoquote.com/images/illustration.svg" alt="Login illustration" class="img-fluid p-5">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
