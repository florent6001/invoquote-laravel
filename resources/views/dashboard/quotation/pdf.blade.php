@extends('layouts.pdf')

@section('content')
    <div style="font-family: Arial, sans-serif;">

        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 50%; vertical-align: top;">
                    <h2 style="font-size: 18px; font-weight: bold;">Information de l'entreprise</h2>
                    @if (!empty($quotation->customer->business->logo))
                        <div style="margin-bottom: 20px;">
                            <img src="{{ public_path('/storage/' . $quotation->customer->business->logo) }}"
                                style="max-width: 200px">
                        </div>
                    @endif
                    <p style="font-size: 14px;">
                        {{ $quotation->customer->business->name }} <br>
                        {{ $quotation->customer->business->address }}, {{ $quotation->customer->business->city }} <br>
                        {{ $quotation->customer->business->zip_code }}, {{ $quotation->customer->business->country }} <br>
                        {{ $quotation->customer->business->email }}, {{ $quotation->customer->business->phone_number }} <br>
                    </p>
                </td>
                <td style="width: 50%; text-align: right; vertical-align: top;">
                    <p style="font-size: 16px; margin-top: 20px;">
                        Devis du {{ date('d/m/Y', strtotime($quotation->created_at)) }} <br>
                        Valide jusqu'au {{ $quotation->created_at->addDays($quotation->customer->business->quote_validity_days)->format('d/m/Y') }}
                    </p>
                </td>
            </tr>
        </table>

        <table style="margin-left:auto;width:50%;text-align: right;">
            <h2 style="font-size: 18px; font-weight: bold;">Information du client</h2>
            <p style="font-size: 14px;">
                {{ $quotation->customer->full_name }} <br>
                {{ $quotation->customer->address }}, {{ $quotation->customer->city }} <br>
                {{ $quotation->customer->zip_code }}, {{ $quotation->customer->country }} <br>
                @if ($quotation->customer->type == 1)
                    Numéro de SIRET: {{ $quotation->customer->registration_number }}<br>
                @endif
            </p>
        </table>

        <p style="font-size: 16px;margin-top: 20px;">
            Intitulé du devis : {{ $quotation->name }}
        </p>


        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="text-align: left; padding: 8px; border: 1px solid #ddd;">Intitulé du service</th>
                    <th style="text-align: center; padding: 8px; border: 1px solid #ddd;">Quantité</th>
                    <th style="text-align: right; padding: 8px; border: 1px solid #ddd;">Prix unitaire</th>
                    <th style="text-align: right; padding: 8px; border: 1px solid #ddd;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quotation->quotation_services as $service)
                    <tr>
                        <td style="text-align: left; padding: 8px; border: 1px solid #ddd;">{{ $service->name }}</td>
                        <td style="text-align: center; padding: 8px; border: 1px solid #ddd;">{{ $service->quantity }}</td>
                        <td style="text-align: right; padding: 8px; border: 1px solid #ddd;">@amount($service->unit_price)</td>
                        <td style="text-align: right; padding: 8px; border: 1px solid #ddd;">@amount($service->quantity * $service->unit_price)</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table style="width: 50%; margin-left:auto; border-collapse: collapse; margin-top: 20px;">
            <tbody>
                <tr>
                    <td style="font-weight: bold; padding: 8px; border: 1px solid #ddd;">Sous total</td>
                    <td style="text-align: right; padding: 8px; border: 1px solid #ddd;">@amount($quotation->subtotal_price)</td>
                </tr>
                <tr>
                    <td style="font-weight: bold; padding: 8px; border: 1px solid #ddd;">TVA
                        <small>({{ $quotation->customer->business->tax_rate }}%)</small>
                    </td>
                    <td style="text-align: right; padding: 8px; border: 1px solid #ddd;">@amount($quotation->tax_price)</td>
                </tr>
                <tr>
                    <td style="font-weight: bold; padding: 8px; border: 1px solid #ddd;">Total:</td>
                    <td style="text-align: right; padding: 8px; border: 1px solid #ddd;">@amount($quotation->total_price_with_taxes)</td>
                </tr>
            </tbody>
        </table>

        @if ($quotation->additionals_informations)
            <div style="margin-top: 20px;">
                <h2 style="font-size: 18px; font-weight: bold;">Informations supplémentaires</h2>
                <div style="font-size: 14px;">{!! $quotation->additionals_informations !!}</div>
            </div>
        @endif

    </div>
@endsection
