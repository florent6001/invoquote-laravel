@extends('layouts.app')

@section('title', $business->name)

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>{{ $business->name }}</h1>
        <div>
            <a href="{{ route('dashboard.business.edit', $business->id) }}" class="btn btn-warning">Modifier</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Supprimer
            </button>
        </div>
    </div>

    <div class="row mt-4">
        @if($business->logo)
        <div class="col-md-4">
            <img src="{{ asset('/storage/' . $business->logo) }}" class="w-100 rounded">
        </div>
        @endif
        <div class="col-md-8">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td><strong>Adresse:</strong> {{ $business->address }}</td>
                        <td><strong>Ville:</strong> {{ $business->city }}</td>
                    </tr>
                    <tr>
                        <td><strong>Code Postal:</strong> {{ $business->zip_code }}</td>
                        <td><strong>Pays:</strong> {{ $business->country }}</td>
                    </tr>
                    <tr>
                        <td><strong>Adresse email:</strong> {{ $business->email }}</td>
                        <td><strong>Numéro de téléphone:</strong> {{ $business->phone_number }}</td>
                    </tr>
                    <tr>
                        <td><strong>Numéro de SIRET:</strong> {{ $business->registration_number }}</td>
                        <td><strong>TVA:</strong> {{ $business->tax_rate }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Validité des devis:</strong> {{ $business->quote_validity_days }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer ce business ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer ce client ? Tous les clients ainsi que toutes les factures et les
                        devis associés seront
                        également supprimés. Cette action ne peut pas être annulée..</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('dashboard.business.destroy', $business) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>
@endsection
