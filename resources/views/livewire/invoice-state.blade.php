@php
    $bgColor = '';
    $text = '';

    switch ($state) {
        case '0':
            $bgColor = 'bg-danger text-black';
            $text = 'Non payée';
            break;
        case '1':
            $bgColor = 'bg-success';
            $text = 'Payée';
            break;
    }
@endphp

<div>
    <select wire:model="state" id="state" class="btn {{ $bgColor }} text-white form-control">
        <option value="0">Non payée</option>
        <option value="1">Payée</option>
    </select>
</div>

