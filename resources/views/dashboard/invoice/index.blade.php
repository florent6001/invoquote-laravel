@extends('layouts/app')

@section('title', 'Liste des factures')

@section('content')
    <div class="mb-3">
        <h1>Liste des factures</h1>
    </div>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Intitulé de la factures</th>
                <th scope="col">Nom du client</th>
                <th scope="col">Montant total</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($invoices as $invoice)
                <tr>
                    <td> {{ $invoice->quotation->name }}</td>
                    <td> {{ $invoice->quotation->customer->full_name }}</td>
                    <td> @amount($invoice->quotation->total_price_with_taxes)</td>
                    <td>
                        <a href="{{ route('dashboard.invoice.show', $invoice->id) }}"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        Vous n'avez pas encore de factures.
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>

    {{ $invoices->links() }}
@endsection
