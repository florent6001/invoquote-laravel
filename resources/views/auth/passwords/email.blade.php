@extends('layouts.guest')

@section('title', 'Mot de passe oublié ?')

@section('content')
    <section class="bg-primary py-5">
        <div class="row">
            <div class="col-md-4 mx-auto bg-white rounded">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <div class="container p-5">
                            <h2>Mot de passe oublié ?</h2>
                            <p>Entrez votre adresse email, nous allons vous envoyer un lien pour le réinitialiser.</p>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="email">{{ __('Email Address') }}</label>

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
