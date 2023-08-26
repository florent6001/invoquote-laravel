@extends('layouts.app')

@section('title', 'Mes entreprises')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Mes entreprises</h1>
        <a href="{{ route('dashboard.business.create') }}" class="btn btn-primary">Ajouter une entreprise</a>
    </div>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Nom de l'entreprise</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($businesses as $business)
                <tr>
                    <td> {{ $business->name }}</td>
                    <td>
                        <a href="{{ route('dashboard.business.show', $business->id) }}"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        Vous n'avez pas encore d'entreprise.
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>
@endsection
