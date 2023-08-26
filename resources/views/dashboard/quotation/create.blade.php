@extends('layouts.app')

@section('title', 'Créer un devis')

@section('content')
    <form action={{ route('dashboard.quotation.store') }} method='POST'>
        @csrf
        <h1 class="mb-3">Création d'un devis</h1>
        @include('dashboard.quotation._form')
        <button type="submit" class="btn btn-primary">Créer le devis</button>
    </form>
@endsection
