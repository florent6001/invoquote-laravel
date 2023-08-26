@extends('layouts.guest')

@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center py-5 bg-primary text-white gap-3">
        <h1 class="display-4 fw-bold">
            Accès interdit
        </h1>
        <p>
            {{ $exception->getMessage() ?: 'Vous n\'avez pas accès à cette page' }}
        </p>
        <div class="d-flex gap-3">
            <a href="{{ route('home') }}" class="btn btn-light">Se rendre à l'accueil</a>
            <a href="{{ url()->previous() }}" class="btn btn-outline-light">Revenir en arrière</a>
        </div>
    </div>
@endsection
