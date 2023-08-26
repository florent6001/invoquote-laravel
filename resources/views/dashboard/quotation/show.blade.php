@extends('layouts/app')

@section('title', 'Devis ' . $quotation->name)

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="h2">Devis - {{ $quotation->name }}</h1>
        <div class="d-flex align-items-center justify-content-between gap-2">
            <a href="{{ route('dashboard.quotation.pdf', $quotation->id) }}" class="btn btn-primary">Version PDF</a>
            @if($quotation->state == 0)
                <a href="{{ route('dashboard.quotation.edit', $quotation->id) }}" class="btn btn-warning">Modifier</a>
            @endif
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Supprimer
            </button>
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
            @foreach($quotation->quotation_services as $service)
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
                <td>@amount($quotation->subtotal_price)</td>
            </tr>
            <tr>
                <td class="fw-bold pe-3">TVA <small>({{ $quotation->customer->business->tax_rate }} %)</small></td>
                <td>@amount($quotation->tax_price)</td>
            </tr>
            <tr>
                <td class="fw-bold pe-3">Total</td>
                <td>@amount($quotation->total_price_with_taxes)
                </td>
            </tr>
        </tbody>
    </table>


    @if($quotation->additionals_informations)
    <div class="mt-5">
        <h2 class="h4">Informations supplémentaire</h2>
        {!! $quotation->additionals_informations !!}
    </div>
    @endif

    <div class="text-end h4">
        @include('partials.state-label', ['state' => $quotation->state_label])
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer ce devis ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer ce devis ? Cette action ne peut pas être annulée..</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('dashboard.quotation.destroy', ['quotation' => $quotation]) }}" method="post">
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
