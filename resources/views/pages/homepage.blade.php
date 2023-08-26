@extends('layouts.guest')

@section('title', 'L\'outil pour gérer votre entreprise facilement')

@section('content')
    <section class="bg-primary pt-5 text-white">
        <div class="container text-center col-lg-8 mx-auto" data-aos="fade-in">
            <h1 class="display-5 fw-bold">
                L'outil qu'il vous faut pour gérer votre auto-entreprise facilement.
            </h1>
            <div class="col-lg-10 mx-auto">
                <p class="lead mb-4 text-light-muted">
                    Bienvenue sur notre site web ! InvoQuote est là pour aider les entrepreneurs et les petites entreprises
                    à gérer efficacement leurs opérations. Avec notre outil, vous pouvez facilement gérer vos clients,
                    générer des factures et des devis, suivre vos paiements, et bien plus encore.
                </p>
                <div class="d-grid gap-0 d-sm-flex justify-content-sm-center">
                    <button type="button" class="btn btn-light btn-lg px-4 rounded">Commencer maintenant</button>
                    <button type="button" class="btn text-white px-4">Voir les fonctionnalitées <i
                            class="bi bi-arrow-right"></i></button>
                </div>
            </div>
            <div class="pt-5">
                <img class="img-fluid border rounded-top" src="{{ asset('img/dashboard.png') }}" alt="">
            </div>
        </div>
    </section>
    <section id="features" class="container pt-5">
        <p class="fs-5 text-primary fw-semibold">Fonctionnalités</p>
        <h3 class="display-6 fw-bold mb-4">Les principales fonctionnalités de notre outil.</h3>
        <p class="w-50">Découvrez les fonctionnalités puissantes d'InvoQuote qui faciliteront la gestion de votre
            auto-entreprise.</p>
        <div class="row g-5 py-5 row-cols-1 row-cols-lg-4" data-aos="fade-up">
            <div class="col">
                <div class="bg-primary p-3 text-white h-5 w-5 d-inline-block mb-4 rounded-3">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h3>Multi-entreprise</h3>
                <p>Gérez plusieurs entreprises à partir d'un seul compte et gardez tout sous contrôle.</p>
            </div>
            <div class="col">
                <div class="bg-primary p-3 text-white h-5 w-5 d-inline-block mb-4 rounded-3">
                    <i class="fa fa-users"></i>
                </div>
                <h3>Devis et facturation</h3>
                <p>Générez des devis professionnels et suivez les paiements de vos factures en un seul endroit.</p>
            </div>
            <div class="col">
                <div class="bg-primary p-3 text-white h-5 w-5 d-inline-block mb-4 rounded-3">
                    <i class="fas fa-file-invoice"></i>
                </div>
                <h3>Calendrier</h3>
                <p>Organisez vos rendez-vous et vos tâches importantes à l'aide de notre calendrier intégré.</p>
            </div>
            <div class="col">
                <div class="bg-primary p-3 text-white h-5 w-5 d-inline-block mb-4 rounded-3">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Rappels</h3>
                <p>Recevez des rappels pour ne manquer aucune échéance et rester en haut de vos activités.</p>
            </div>
        </div>
    </section>
    <section id="about" class="bg-light py-5">
        <div class="container">
            <div class="row col-md-10 mx-auto bg-white p-5 rounded">
                <div class="row" data-aos="fade-up">
                    <div class="col-md-6 col-12">
                        <h2 class="mb-5">
                            L'objectif de InvoQuote
                        </h2>
                        <p class="lead">
                            Notre objectif principal est de fournir aux entrepreneurs et aux petites entreprises un outil
                            complet pour gérer efficacement leurs opérations commerciales. Avec des fonctionnalités
                            avancées, vous pouvez facilement gérer vos clients, générer des devis et des factures, suivre
                            vos paiements et bien plus encore.
                        </p>

                        <p class="lead pt-3">
                            L'outil InvoQuote est conçu pour simplifier votre travail, vous permettant de vous concentrer
                            sur ce qui compte vraiment: faire grandir votre entreprise. Rejoignez-nous dès aujourd'hui et
                            découvrez comment notre plateforme peut vous aider à gagner du temps et à gérer votre entreprise
                            avec succès.
                        </p>
                    </div>
                    <div class="col-md-6 d-none d-md-block">
                        <img src="https://preview.uideck.com/items/play-bootstrap/assets/images/about/about-image.svg"
                            alt="about-image" class="w-100 d-block p-5 ms-auto text-end">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="pricing" class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 py-4">
                    <div class="mb-4">
                        <h2 class="mb-3">Nos Tarifs</h2>
                        <p class="lead">Profitez de toutes les fonctionnalités de base gratuitement, à tout moment.</p>
                        <p>Que vous soyez une auto-entreprise ou une petite entreprise, notre plan gratuit vous offre
                            un accès illimité à toutes les fonctionnalités dont vous avez besoin pour gérer votre activité
                            efficacement. Aucun coût caché, aucun engagement. C'est notre engagement envers vous.</p>
                    </div>
                    <a href="{{ route('register') }}" class="btn btn-light">Commencer gratuitement</a>
                </div>
                <div class="col-md-4 py-4 mx-auto" data-aos="flip-left">
                    <div class="card shadow-lg">
                        <div class="card-header bg-primary text-white">
                            <h3 class="fw-bold">Plan Gratuit</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Toutes les fonctionnalités de base</p>
                            <p class="card-text">Accès gratuit pour toujours</p>
                            <p class="card-text">Support par e-mail</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 py-4">
                    <h2 class="mb-4">Contactez-nous</h2>
                    <p>Pour toute question ou demande de renseignements, n'hésitez pas à nous contacter. Nous sommes là
                        pour vous aider!</p>
                    <p>Nous serions ravis d'entendre parler de vous. Remplissez simplement le formulaire à droite et
                        nous vous répondrons dès que possible.</p>
                </div>
                <div class="col-md-6 py-4" data-aos="fade-in">
                    <div class="card p-4 border-0 shadow rounded">
                        <form method="POST" action={{ route('send_support') }}>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5"
                                    required>{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer ma demande</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
