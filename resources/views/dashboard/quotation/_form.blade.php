    @csrf
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Intitulé du devis</label>
            <input type="text" name="name" value="{{ old('name', $quotation->name) }}" class="form-control">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        @if (!$quotation->id)
            <div class="col-md-6 mb-3">
                <label>Client</label>
                <select name="customer_id" class="form-control">
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ request('customer') == $customer->id ? 'selected' : '' }}
                            {{ old('customer_id', optional($quotation->customer)->id) == $customer->id ? 'selected' : '' }}>
                            {{ $customer->full_name }}</option>
                    @endforeach
                </select>
                @error('customer_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        @endif
        @if ($quotation->id)
            <div class="col-md-6 mb-3">
                <label>Etat du devis</label>
                <select name="state" value="{{ old('state', $quotation->state) }}" class="form-control">
                    <option value="0">En attente</option>
                    <option value="1">Accepté</option>
                    <option value="2">Refusé</option>
                </select>
                @error('state')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        @endif
    </div>
    <div id="quotations-services">
        <div class="row mb-3">
            <p class="lead">Services</p>
            <div class="col-md-5">Intitulé</div>
            <div class="col-md-2">Quantité</div>
            <div class="col-md-3">Prix unitaire</div>
            <div class="col-md-2">Actions</div>
        </div>
        @livewire('quotation-lines', ['quotation_services' => $quotation->quotation_services])

    </div>

    <div class="mt-5 mb-3">
        <label>Informations supplémentaires</label>
        <textarea name="additionals_informations" class="form-control">{{ old('additionals_informations', $quotation->additionals_informations) }}</textarea>
        @error('additionals_informations')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
