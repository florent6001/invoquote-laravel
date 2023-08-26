@extends('layouts.app')

@section('title', 'Ajouter un client')

@section('content')
    <form action={{ route('dashboard.customer.store') }} method='POST'>
        @csrf
        <h1 class="mb-3">Ajouter un nouveau client</h1>
        <livewire:customer-form />
        <button type="submit" class="btn btn-primary">Ajouter ce client</button>
    </form>
@endsection
