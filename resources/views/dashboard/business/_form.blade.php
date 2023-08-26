<div class="row">
    <div class="col-md-4">
        <livewire:business-logo-upload />
        @error('logo')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-8">
        <h2 class="lead">Identité</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name">Nom de l'entreprise</label>
                <input type="text" name="name" value="{{ old('name', $business->name ?? '') }}"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="registration_number">Numéro de SIRET</label>
                <input type="number" name="registration_number"
                    value="{{ old('registration_number', $business->registration_number ?? '') }}"
                    class="form-control @error('registration_number') is-invalid @enderror">
                @error('registration_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <h2 class="lead">Contacts</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email">Adresse email</label>
                <input type="text" name="email" value="{{ old('email', $business->email ?? '') }}"
                    class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone_number">Numéro de téléphone</label>
                <input type="number" name="phone_number"
                    value="{{ old('phone_number', $business->phone_number ?? '') }}"
                    class="form-control @error('phone_number') is-invalid @enderror">
                @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <!-- ... Previous code ... -->

        <h2 class="lead">Adresse postale</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="address">Adresse</label>
                <input type="text" name="address" value="{{ old('address', $business->address ?? '') }}"
                    class="form-control @error('address') is-invalid @enderror">
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="city">Ville</label>
                <input type="text" name="city" value="{{ old('city', $business->city ?? '') }}"
                    class="form-control @error('city') is-invalid @enderror">
                @error('city')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="zip_code">Code postal</label>
                <input type="text" name="zip_code" value="{{ old('zip_code', $business->zip_code ?? '') }}"
                    class="form-control @error('zip_code') is-invalid @enderror">
                @error('zip_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="country">Pays</label>
                <select name="country" class="form-control @error('country') is-invalid @enderror">
                    <option value="">Select a country</option>
                    @foreach ($countries as $countryCode => $countryName)
                        <option value="{{ $countryCode }}"
                            {{ old('country', $business->country ?? '') === $countryCode ? 'selected' : '' }}>
                            {{ $countryName }}
                        </option>
                    @endforeach
                </select>
                @error('country')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <h2 class="lead">Facturation</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="tax_rate">Pourcentage de TVA</label>
                <input type="number" name="tax_rate" value="{{ old('tax_rate', $business->tax_rate ?? '') }}"
                    class="form-control @error('tax_rate') is-invalid @enderror">
                @error('tax_rate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="quote_validity_days">Durée de validité d'un devis</label>
                <input type="number" name="quote_validity_days"
                    value="{{ old('quote_validity_days', $business->quote_validity_days ?? 30) }}"
                    class="form-control @error('quote_validity_days') is-invalid @enderror">
                @error('quote_validity_days')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
