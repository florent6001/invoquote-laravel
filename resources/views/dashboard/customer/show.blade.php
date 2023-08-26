@extends('layouts/app')

@section('title', 'Client : ' . $customer->full_name)

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>{{ $customer->full_name }}</h1>
        <div class="d-flex justify-content-between align-items-center gap-2">
            <a href="{{ route('dashboard.quotation.create', ['customer' => $customer->id]) }}" class="btn btn-primary">Créer
                un devis</a>
            <a href="{{ route('dashboard.customer.edit', $customer->id) }}" class="btn btn-warning">Modifier</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Supprimer
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 my-3">
            <div class="card">
                <div class="card-body">
                    <h2 class="h5">Informations du client</h2>
                    <table class="table mt-4">
                        <tbody>
                            <tr>
                                <th>Adresse email</th>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <th>Numéro de téléphone</th>
                                <td>{{ $customer->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Adresse</th>
                                <td>
                                    {{ $customer->address }}, {{ $customer->city }} <br>
                                    {{ $customer->zip_code }}, {{ $customer->country }}
                                </td>
                            </tr>
                            <tr>
                                <th>Site internet</th>
                                <td>{{ $customer->website_url }}</td>
                            </tr>
                            @if ($customer->type == 1)
                                <tr>
                                    <th>Numéro de siret</th>
                                    <td>{{ $customer->registration_number }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 my-3 d-flex flex-column gap-3">
            <div class="card">
                <div class="card-body">
                    <h2 class="h5">Dernières factures</h2>
                    <table class="table mt-4">
                        <tbody>
                            @foreach ($customer->invoices->sortByDesc('created_at')->slice(0, 5) as $invoice)
                                <a href="#">
                                    <tr>
                                        <th>{{ $invoice->quotation->name }}</th>
                                        <td>@amount($invoice->totalPriceWithTaxes)</td>
                                        <td>
                                            @include('partials.invoice-state-label', [
                                                'state' => $invoice->state,
                                            ])
                                        </td>
                                        <td><a href="{{ route('dashboard.invoice.show', $invoice->id) }}">Afficher</a>
                                        </td>
                                    </tr>
                                </a>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2 class="h5">Derniers devis</h2>
                    <table class="table mt-4">
                        <tbody>
                            @foreach ($customer->quotations->sortByDesc('created_at')->slice(0, 5) as $quotation)
                                <a href="#">
                                    <tr>
                                        <th>{{ $quotation->name }}</th>
                                        <td>@amount($quotation->totalPriceWithTaxes)</td>
                                        <td>@include('partials.state-label', [
                                            'state' => $quotation->state_label,
                                        ])</td>
                                        <td><a href="{{ route('dashboard.quotation.show', $quotation->id) }}">Afficher</a>
                                        </td>
                                    </tr>
                                </a>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 my-3">
            <div class="card">
                <div class="card-body">
                    <h2 class="h5 mb-3">Notes</h2>
                    {{ $customer->notes }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer ce client ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer ce client ? Toutes les factures et les devis associés seront
                        également supprimés. Cette action ne peut pas être annulée..</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('dashboard.customer.destroy', ['customer' => $customer]) }}" method="post">
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
