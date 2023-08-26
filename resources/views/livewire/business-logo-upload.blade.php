<div>
    @if ($image)
        <img src="{{ $image->temporaryUrl() }}" alt="Preview Business Image" class="w-100 mb-3">
        {{ $image }}
    @endif
    <input type="file" name="logo" class="form-control" wire:model="image">
</div>
