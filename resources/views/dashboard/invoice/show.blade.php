@extends('layouts/app')

@section('title', 'Facture ' . $invoice->quotation->name)

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="h2">Facture du {{ date('d/m/y', $invoice->create_at) }} - {{ $invoice->quotation->customer->full_name }}</h1>
        <div class="d-flex align-items-center justify-content-between gap-2">
            <livewire:invoice-state :invoice="$invoice" />
            <a href="{{ route('dashboard.invoice.pdf', $invoice->id) }}" class="btn btn-primary">Version PDF</a>
        </div>
    </div>

    <table class="table table-striped mt-4 table-responsive text-end">
        <thead>
            <tr>
                <th class="text-start">Intitulé du service</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->quotation->quotation_services as $service)
                <tr>
                    <td class="text-start">{{ $service->name }}</td>
                    <td>{{ $service->quantity }}</td>
                    <td>@amount($service->unit_price)</td>
                    <td>@amount($service->unit_price * $service->quantity)</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="w-auto table table-striped table-borderless ms-auto text-end">
        <tbody>
            <tr>
                <td class="fw-bold pe-3">Sous-total</td>
                <td>@amount($invoice->subtotal_price)</td>
            </tr>
            <tr>
                <td class="fw-bold pe-3">TVA <small>({{ $invoice->quotation->customer->business->tax_rate }} %)</small></td>
                <td>@amount($invoice->tax_price)</td>
            </tr>
            <tr>
                <td class="fw-bold pe-3">Total</td>
                <td>@amount($invoice->total_price_with_taxes)
                </td>
            </tr>
        </tbody>
    </table>


    @if($invoice->additionals_informations)
    <div class="mt-5">
        <h2 class="h4">Informations supplémentaire</h2>
        {!! $invoice->additionals_informations !!}
    </div>
    @endif
@endsection
