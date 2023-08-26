<div class="row">
    <div class="col-md-12">
        @if (empty($customer->id))
        <div class="row">
            <h2 class="lead">Type de client</h2>
            <div class="col-md-12 mb-3">
                <div class="d-flex gap-2">
                    <input type="radio" wire:model="type" value="0" name="type" class="btn-check" id="individual"
                        autocomplete="off">
                    <label class="btn btn-outline-primary" for="individual">Particulier</label>
                    <input type="radio" wire:model="type" value="1" name="type" class="btn-check"
                        id="business" autocomplete="off">
                    <label class="btn btn-outline-primary" for="business">Professionnel</label>
                </div>
                @error('client_type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        @endif
        @if ($type == 0 || $type == 1)
            <h2 class="lead">Identité</h2>
            <div class="row">
                @if ($type == 0)
                    <div class="col-md-6 mb-3">
                        <label for="first_name">Prénom</label>
                        <input type="text" name="first_name"
                            value="{{ old('first_name', $customer->first_name ?? '') }}"
                            class="form-control @error('first_name') is-invalid @enderror">
                        @error('first_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last_name">Nom</label>
                        <input type="text" name="last_name"
                            value="{{ old('last_name', $customer->last_name ?? '') }}"
                            class="form-control @error('last_name') is-invalid @enderror">
                        @error('last_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @else
                    <div class="col-md-6 mb-3">
                        <label for="name">Nom de l'entreprise</label>
                        <input type="text" name="name"
                            value="{{ old('name', $customer->name ?? '') }}"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="registration_number">Numéro de SIRET</label>
                        <input type="text" name="registration_number" value="{{ old('registration_number', $customer->registration_number ?? '') }}"
                            class="form-control @error('registration_number') is-invalid @enderror">
                        @error('registration_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endif
            </div>

            <h2 class="lead">Contacts</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email">Adresse email</label>
                    <input type="text" name="email" value="{{ old('email', $customer->email ?? '') }}"
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
                        value="{{ old('phone_number', $customer->phone_number ?? '') }}"
                        class="form-control @error('phone_number') is-invalid @enderror">
                    @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="website_url">Site Web</label>
                    <input type="text" name="website_url"
                        value="{{ old('website_url', $customer->website_url ?? '') }}"
                        class="form-control @error('website_url') is-invalid @enderror">
                    @error('website_url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <h2 class="lead">Adresse postale</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="address">Adresse</label>
                    <input type="text" name="address" value="{{ old('address', $customer->address ?? '') }}"
                        class="form-control @error('address') is-invalid @enderror">
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="city">Ville</label>
                    <input type="text" name="city" value="{{ old('city', $customer->city ?? '') }}"
                        class="form-control @error('city') is-invalid @enderror">
                    @error('city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="zip_code">Code postal</label>
                    <input type="text" name="zip_code" value="{{ old('zip_code', $customer->zip_code ?? '') }}"
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
                        <option value="">Sélectionner un pays</option>
                        @foreach ($countries as $countryCode => $countryName)
                            <option value="{{ $countryCode }}"
                                {{ old('country', $customer->country ?? '') === $countryCode ? 'selected' : '' }}>
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

            <h2 class="lead">Notes</h2>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" rows="4">{{ old('notes', $customer->notes ?? '') }}</textarea>
                    @error('notes')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        @endif
    </div>
</div>
