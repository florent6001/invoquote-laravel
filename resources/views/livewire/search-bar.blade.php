<ul class="navbar-nav w-50 mb-2 mb-md-0 d-none d-md-block position-relative">
    <div class="input-group">
        <input class="form-control" wire:model.debounce.500ms="searchTerm"  placeholder="Rechercher un client, un devis, une facture ..." type="search"
            data-model="query">
        <button class="btn btn-light" type="button">
            <i class="fa fa-magnifying-glass"></i>
        </button>
    </div>
    <ul class="list-group position-absolute rounded-0 rounded-bottom w-100 border bg-white z-3 p-0">
        @if($searchTerm)
            @if($results['invoices']->count() > 0)
                <li class="list-group-item">Factures</li>
                @foreach ($results['invoices'] as $invoice)
                    <li class="list-group-item ps-5">{{ date('d/m/Y', $invoice->createAt) }} - {{ $invoice->quotation->customer->full_name }} - @amount($invoice->quotation->total_price_with_taxes)</li>
                @endforeach
            @endif
            @if($results['quotations']->count() > 0)
                <li class="list-group-item">Devis</li>
                @foreach ($results['quotations'] as $quotation)
                    <li class="list-group-item ps-5">{{ $quotation->name }} - {{ $quotation->customer->full_name }} - @amount($quotation->total_price_with_taxes)</li>
                @endforeach
            @endif

            @if($results['customers']->count() > 0)
                <li class="list-group-item">Clients</li>
                @foreach ($results['customers'] as $customer)
                    <li class="list-group-item ps-5"><a href="{{ route('dashboard.customer.show', $customer->id )}}">{{ $customer->first_name }} {{ $customer->last_name }}</a></li>
                @endforeach
            @endif
        @endif
    </ul>
</ul>
