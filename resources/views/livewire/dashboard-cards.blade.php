<div class="row mb-3">
    <div class="col-md-12 d-flex align-items-center mb-3">
        <h2 class="h5">Voici quelques statistiques qui peuvent t'intéresser</h2>
        <select wire:model="days" class="ms-auto form-control form-select w-auto mb-3" aria-labelledby="navbarDropdown">
            <option value="30">
                30 derniers jours
            </option>
            <option value="60">
                60 derniers jours
            </option>
            <option value="90">
                90 derniers jours
            </option>
        </select>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-12 col-md-3 mb-3">
                <div class="card border-primary border-bottom">
                    <div class="card-body">
                        <h2 class="card-title h5">Nouveau clients</h2>
                        <p class="card-text h2">
                            {{ $newCustomersCount }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 mb-3">
                <div class="card border-info border-bottom">
                    <div class="card-body">
                        <h2 class="card-title h5">Devis généré</h2>
                        <p class="card-text h2">
                            {{ $generatedQuotationsCount }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 mb-3">
                <div class="card border-warning border-bottom">
                    <div class="card-body">
                        <h2 class="card-title h5">Devis accepté</h2>
                        <p class="card-text h2">
                            {{ $acceptedQuotationsCount }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 mb-3">
                <div class="card border-danger border-bottom">
                    <div class="card-body">
                        <h2 class="card-title h5">Revenu</h2>
                        <p class="card-text h2">
                            @amount($totalRevenue)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
