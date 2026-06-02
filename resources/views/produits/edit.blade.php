@extends('template')

@section('title', "modification d'un produit")
@section('h1', 'modifier un produit')

@section('content')

    <form class="user" method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" placeholder="Nom du produit..." name="nom" value="{{ $product->nom }}">
                    @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <input type="number" class="form-control @error('quantite') is-invalid @enderror" placeholder="Saisissez la quantité..." name="quantite" value="{{ $product->quantite }}">
                    @error('quantite')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <input type="text" class="form-control @error('prix') is-invalid @enderror" placeholder="Entrez le prix..." name="prix" value="{{ $product->prix }}">
                    @error('prix')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <select name="categorie_id" class="form-control @error('categorie_id') is-invalid @enderror">
                        <option value="">-- Sélectionnez la catégorie du produit --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{
                              $product->categorie_id == $category->id ? 'selected' : '' }}> {{ $category->libelle }} </option>
                        @endforeach
                    </select>
                    @error('categorie_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            Mettre à jour
        </button>

        <a class="btn btn-secondary" href="{{route('products.index')}}">
            Retour
        </a>
    </form>

@endsection
