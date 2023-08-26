@extends('layouts.app')

@section('title', 'Demande de support')

@section('content')
    <h1>Demande de support</h1>
    <p>
        Merci d'avoir visité notre page de support pour les demandes de fonctionnalités ou les rapports de bugs. Vos
        commentaires sont précieux pour nous et nous sommes là pour vous aider. Soyez assuré que nous répondrons à votre
        demande dans les 24 heures. Veuillez procéder à soumettre votre demande, et nous serons en contact sous peu.
        <br><br>
        Merci pour votre patience.
    </p>

    <form action="{{ route('dashboard.support.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="type">Type de demande</label>
            <select name="type" id="type" class="form-control">
                <option value="Featurs">Demande de fonctionnalitées</option>
                <option value="Bug">Rapport de bugs</option>
                <option value="Other">Autres</option>
            </select>
            @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3" method="POST">
            <label for="message">Votre message</label>
            <textarea name="message" id="message" class="form-control" rows="5">
            </textarea>
            @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Envoyer ma demande</button>
    </form>
@endsection
