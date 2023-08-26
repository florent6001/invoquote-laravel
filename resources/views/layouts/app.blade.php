<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - InvoQuote</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss'])
</head>

<body class="bg-body">
    <div class="d-flex">
        <div class="collapse md-show d-lg-block" id="sidebar">
            <div class="d-flex bg-primary shadow flex-column flex-shrink-0 p-3 min-vh-100 h-100" style="width: 280px;">
                <a href="{{ route('dashboard.index') }}" class="text-decoration-none">
                    <h1 class="text-white text-center fs-4 mt-3">InvoQuote</h1>
                </a>
                <ul class="nav nav-pills navbar-nav navbar-dark flex-column mb-auto mt-4">
                    <li class="nav-item">
                        <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" aria-current="page">
                            <i class="fas fa-home"></i>
                            Tableau de bord
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard.customer.index') }}"
                            class="nav-link {{ request()->is('dashboard/customer*') ? 'active' : '' }}"
                            aria-current="page">
                            <i class="fas fa-users"></i>
                            Clients
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard.quotation.index') }}"
                            class="nav-link {{ request()->is('dashboard/quotation*') ? 'active' : '' }}"
                            aria-current="page">
                            <i class="fas fa-file"></i>
                            Devis
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard.invoice.index') }}" class="nav-link {{ request()->is('dashboard/invoice*') ? 'active' : '' }}" aria-current="page">
                            <i class="fas fa-file-invoice"></i>
                            Factures
                        </a>
                    </li>
                    <li class="nav-item mt-5">
                        <a href="{{ route('dashboard.support.create') }}" class="nav-link bg-warning text-dark" aria-current="page">
                            <i class="fas fa-life-ring"></i>
                            Assistance
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-100">
            <header>
                <nav class="shadow shadow-sm navbar navbar-expand navbar-dark bg-primary">
                    <div class="container-fluid px-3">
                        <div class="collapse navbar-collapse" id="navbar">
                            <button class="d-block d-lg-none navbar-toggler me-3" type="button"
                                data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <livewire:search-bar />
                            <a href="/dashboard"
                                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
                            </a>
                            <ul class="navbar-nav ms-auto navbar-light mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a href="" class="nav-link d-flex align-items-center"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <p class="mx-2 my-0 dropdown-toggle">
                                            <strong>
                                                {{ Auth::user()->fullName }}
                                            </strong>
                                        </p>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <li class="nav-item dropdown">
                                            @forelse (Auth::user()->businesses as $business)
                                                <a href="{{ route('dashboard.active_business.edit', $business->id) }}" class="dropdown-item @if(Cookie::get('active_business') == $business->id) active @endif">{{ $business->name }}</a>
                                            @empty
                                                <a href="{{ route('dashboard.business.create') }}" class="dropdown-item">Aucune entreprise active</a>
                                            @endforelse
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard.business.index') }}" class="dropdown-item">
                                                Mes entreprises
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard.account.edit', Auth::user()->id) }}" class="dropdown-item">
                                                Paramètres de compte
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Se déconnecter') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <main>
                <div class="m-5">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    @vite(['resources/js/app.js'])
    @livewireScripts
</body>

</html>
