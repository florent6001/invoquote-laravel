@extends('layouts.app')

@section('title', 'Modifier mon entreprise')

@section('content')
    <form action={{ route('dashboard.business.update', $business->id) }} method='POST' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1 class="mb-3">Modifier l'entreprise {{ $business->name }}</h1>
        @include('dashboard.business._form')
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
