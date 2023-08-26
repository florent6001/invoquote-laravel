@extends('layouts.app')

@section('title', "Tableau de bord")

@section('content')
    <div class="row">
        <div class="d-flex align-items-center">
            <div class="">
                <h1 class="h2">Bon retour parmi nous {{ Auth::user()->first_name }},</h1>
            </div>
        </div>
        <livewire:dashboard-cards />
        <div class="row mt-3">
            <div class="col-md-6">
                <h2>Dernières factures</h2>
                <div class="table-responsive mt-3">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Numéro de facture</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->invoice_number }}</td>
                                <td>{{ $invoice->customer->full_name }}</td>
                                <td>{{ date('d/m/Y', $invoice->createAt) }}</td>
                                <td>@include('partials.invoice-state-label', ['state' => $invoice->state])</td>
                                <td><a href="{{ route('dashboard.invoice.show', $invoice->id) }}" class="btn btn-sm btn-primary">Afficher</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h2>Derniers devis</h2>
                <div class="table-responsive mt-3">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Montant</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quotations as $quotation)
                            <tr>
                                <td>{{ $quotation->customer->full_name }}</td>
                                <td>@amount($quotation->total_price_with_taxes)</td>
                                <td>@include('partials.state-label', ['state' => $quotation->state_label])</td>
                                <td><a href="{{ route('dashboard.quotation.show', $quotation->id) }}" class="btn btn-sm btn-primary">Afficher</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
