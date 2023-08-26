@extends('layouts.app')

@section('title', 'Paramètres du compte')

@section('content')
    <h1>Paramètres du compte</h1>

    <form method="POST" action="{{ route('dashboard.account.update', Auth::user()->id) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="first_name">Prénom</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                    placeholder="Prénom" value="{{ old('first_name', Auth::user()->first_name) }}">
                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="last_name">Nom</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                    placeholder="Nom" value="{{ old('last_name', Auth::user()->last_name) }}">
                @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="email">Adresse email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Adresse email" value="{{ old('email', Auth::user()->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Mot de passe">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="password_confirmation">Confirmation du mot de passe</label>
                <input type="password" name="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    placeholder="Confirmation du mot de passe">
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </form>


<h2 class="mt-5">Supprimer mon compte</h2>
<p>Si vous supprimez votre compte, toutes les entreprises et les clients associés seront également supprimés.</p>
<p>Cette action est définitive et ne peut pas être annulée.</p>

<form method="POST" action="{{ route('dashboard.account.destroy', Auth::user()->id) }}">
    @method('DELETE')
    @csrf
    <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#deleteModal">
        Supprimer mon compte
    </button>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer votre compte ?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        Si vous le souhaitez, vous pouvez nous dire pourquoi vous partez, cela nous aidera à améliorer
                        nos services.
                    </div>
                    <textarea name="message" class="form-control" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
