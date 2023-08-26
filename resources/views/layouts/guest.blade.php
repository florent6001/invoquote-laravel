<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - InvoQuote</title>

    <!-- Styles -->
    @vite(['resources/sass/app.scss'])
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3">
            <div class="container">
                <a class="navbar-brand text-white fw-bold position-relative" href="{{ route('home') }}">
                    InvoQuote
                    <span class="badge beta-badge" style="right: -10px">
                        Beta
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#features">Fonctionnalitées</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#pricing">Tarifs</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @auth
                            <li class="nav-item">
                                <a class="ms-3 btn btn-light" href="{{ route('dashboard.index') }}">Accéder à mon espace</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                            </li>
                            <li class="nav-item">
                                <a class="ms-3 btn btn-light" href="{{ route('register') }}">Créer un compte</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="border-top">
        <div class="bg-primary py-5 text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="w-md-75">
                            <a class="text-white fw-bold fs-4 text-decoration-none" href="{{ route('home') }}">
                                InvoQuote
                            </a>
                            <p class="mt-2">
                                Notre outil vous aide dans la gestion de les documents de vos entreprises (factures,
                                devis,
                                ..). Dans la liste de vos clients, et dans la plannification de votre agenda.
                            </p>
                        </div>
                    </div>
                    <div class="offset-md-3 col-md-3">
                        <h4>Accès rapide</h4>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Accueil</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Créer un compte</a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}">Se connecter</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4>Documents légaux</h4>
                        <ul>
                            <li>
                                <a href="{{ route('mentions_legales') }}">Mentions légales</a>
                            </li>
                            <li>
                                <a href="{{ route('politique_confidentialite') }}">Politiques de confidentialitée des données</a>
                            </li>
                            <li>
                                <a href="{{ route('conditions_utilisation') }}">Conditions d'utilisations</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row text-center mt-3">
                    <p>
                        Fait avec <i class="fa fa-heart"></i> par <a href="https://florent-vandroy.fr/">Florent Vandroy</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    @vite(['resources/js/app.js'])
    @include('partials.cookies')
</body>
