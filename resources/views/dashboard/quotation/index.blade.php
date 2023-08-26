@extends('layouts/app')

@section('title', 'Liste des devis')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Liste des devis</h1>
        <a href="{{ route('dashboard.quotation.create') }}" class="btn btn-primary">Créer un devis</a>
    </div>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Intitulé du devis</th>
                <th scope="col">Nom du client</th>
                <th scope="col">Montant total</th>
                <th scope="col">Etat</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($quotations as $quotation)
                <tr>
                    <td> {{ $quotation->name }}</td>
                    <td> {{ $quotation->customer->full_name }}</td>
                    <td> @amount($quotation->total_price_with_taxes)</td>
                    <td>
                        @include('partials.state-label', ['state' => $quotation->state_label])
                    </td>
                    <td>
                        <a href="{{ route('dashboard.quotation.show', $quotation->id) }}"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        Vous n'avez pas encore de devis.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $quotations->links() }}
@endsection
