@extends('template')

@section('title', 'Liste des opérations')
@section('h1', 'Liste des opérations')

@section('content')

    <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Type</th>
                                <th class="text-center">Quantité</th>
                                <th class="text-center">Nom du produit</th>
                                <th class="text-center">Effectué par</th>
                                <th class="text-center">Date de l'opération</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mouvements as $mvmt)
                                <tr>
                                    <td class="text-center">
                                        @if ($mvmt->type === "entree")
                                            <span class="badge badge-success">
                                                {{ Str::ucfirst($mvmt->type) }}
                                            </span>
                                        @else
                                            <span class="badge badge-danger">
                                                {{ Str::ucfirst($mvmt->type) }}
                                            </span>
                                        @endif

                                    </td>
                                    <td class="text-center">
                                        {{ $mvmt->quantite }}
                                    </td>
                                    <td class="text-center">
                                        {{ $mvmt->product->nom }}
                                    </td>
                                    <td class="text-center">
                                        {{ $mvmt->user->name }}
                                       <br> <small class="text-muted">{{ $mvmt->user->role }}</small>
                                    </td>
                                    <td class="text-center">
                                        {{ $mvmt->date_mouvement }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <p class="alert alert-danger text-center">
                                            Aucune opération ajoutée !
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

    </div>

@endsection
