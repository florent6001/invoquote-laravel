@php
    $bgColor = '';

    switch ($state) {
        case 'En attente':
            $bgColor = 'bg-warning text-black';
            break;
        case 'Accepté':
            $bgColor = 'bg-success';
            break;
        case 'Refusé':
            $bgColor = 'bg-danger';
            break;
        default:
            $bgColor = 'bg-info';
            break;
    }
@endphp

<p>
    <span class="badge text-white badge-lg {{ $bgColor }}">
        {{ $state }}
    </span>
</p>
