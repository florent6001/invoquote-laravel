@extends('layouts.app')

@section('title', 'Modificatin du client : ' . $customer->full_name)

@section('content')
    <form action={{ route('dashboard.customer.update', $customer->id) }} method='POST' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1 class="mb-3">Modifier le client {{ $customer->full_name }}</h1>
        <livewire:customer-form :customer="$customer" />
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
