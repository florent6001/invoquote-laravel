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
        default:
            $bgColor = 'bg-info';
            break;
    }
@endphp

<p>
    <span class="badge text-white badge-lg {{ $bgColor }}">
        {{ $text }}
    </span>
</p>
