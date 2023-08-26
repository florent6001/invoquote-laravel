@extends('layouts/app')

@section('title', 'Liste des clients')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Liste des clients</h1>
        <a href="{{ route('dashboard.customer.create') }}" class="btn btn-primary">Ajouter un client</a>
    </div>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Adresse email</th>
                <th scope="col">Numéro de téléphone</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($customers as $customer)
                <tr>
                    <td> {{ $customer->fullname }}</td>
                    <td> {{ $customer->email }}</td>
                    <td> {{ $customer->phone_number }}</td>
                    <td>
                        <a href="{{ route('dashboard.customer.show', $customer->id) }}"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        Vous n'avez pas encore de client.
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>
@endsection
