@extends('layouts.app')

@section('title', 'Ajouter une entreprise')

@section('content')
    <form action={{ route('dashboard.business.store') }} method='POST' enctype="multipart/form-data">
        @csrf

        @if(Auth::user()->businesses->count() == 0)
            <div class="alert alert-primary mb-4">
                Afin de pouvoir utiliser entièrement InvoQuote, vous devez tout d'abord renseigner les informations de votre entreprise. Vous pourez ensuite en ajouter d'autres si vous le souhaitez.
            </div>
        @endif

        <h1 class="mb-3">Ajouter une entreprise</h1>
        @include('dashboard.business._form')
        <button type="submit" class="btn btn-primary">Ajouter cette entreprise</button>
    </form>
@endsection
