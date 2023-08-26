@extends('layouts.app')

@section('title', 'Modifier un devis')

@section('content')
    <form action={{ route('dashboard.quotation.update', $quotation->id) }} method='POST' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1 class="mb-3">Modifier le devis</h1>
        @include('dashboard.quotation._form')
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
