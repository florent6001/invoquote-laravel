<div>
    @foreach ($lines as $key => $line)
        <div class="row mb-3" wire:key="{{ $key }}">
            <div class="col-md-5">
                <input wire:model="lines.{{ $key }}.name" name="lines[{{ $key }}][name]" type="text"
                    class="form-control" placeholder="Name"">
                @error("lines.{$key}.name")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-2">
                <input wire:model="lines.{{ $key }}.quantity" name="lines[{{ $key }}][quantity]"
                    type="number" class="form-control" placeholder="Quantity">
                @error("lines.{$key}.quantity")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-3">
                <input wire:model="lines.{{ $key }}.unit_price" name="lines[{{ $key }}][unit_price]"
                    type="number" class="form-control" placeholder="Unit Price">
                @error("lines.{$key}.unit_price")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            @if ($key > 0)
                <div class="col-md-2">
                    <button wire:click="removeLine('{{ $key }}')" type="button"
                        class="btn btn-danger w-100">Supprimer</button>
                </div>
            @endif
        </div>
    @endforeach

    <button wire:click="addLine" type="button" class="btn btn-primary">Ajouter une ligne</button>
</div>
