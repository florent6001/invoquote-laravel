@extends('layouts.guest')

@section('title', 'Erreur 404')

@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center py-5 bg-primary text-white gap-3">
        <h1 class="display-4 fw-bold">
            Page introuvable
        </h1>
        <p>La page à laquelle vous essayez de vous rendre n'existe pas.</p>
        <div class="d-flex gap-3">
            <a href="{{ route('home') }}" class="btn btn-light">Se rendre à l'accueil</a>
            <a href="{{ url()->previous() }}" class="btn btn-outline-light">Revenir en arrière</a>
        </div>
    </div>
@endsection