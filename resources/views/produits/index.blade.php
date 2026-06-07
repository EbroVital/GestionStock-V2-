@extends('template')

@section('title', 'Liste des produits')
@section('h1', 'Liste des produits')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Stock total : {{ $stocks }} </h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Prix</th>
                                <th class="text-center">Quantité</th>
                                <th class="text-center">Catégorie du produit</th>
                                <th class="text-center" colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produits as $product)
                                <tr>
                                    <td class="text-center"> {{ $product->id }} </td>
                                    <td class="text-center"> {{ Str::ucfirst($product->nom) }} </td>
                                    <td class="text-center">
                                         <span class="badge badge-success">
                                            {{ $product->prix }} FCFA
                                         </span>
                                    </td>
                                    <td class="text-center"> {{ $product->quantite }} </td>
                                    <td class="text-center">
                                        {{ $product->category->libelle }}
                                    </td>

                                    @if ( Auth::user()->role === "admin")

                                        <td class="text-center">

                                                <a href="{{route('products.edit', $product)}}" class="btn btn-primary">Modifier</a>

                                                <form action="{{ route('products.destroy', $product)}}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous supprimer ce produit ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">Supprimer</button>
                                                </form>

                                        </td>

                                    @else
                                        <td class="text-center">
                                            <small class="text-muted">
                                                Vous n'avez pas accès aux actions
                                            </small>
                                        </td>
                                    @endif

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <p class="alert alert-danger text-center">
                                            Aucun produit ajouté !
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
