@extends('template')

@section('title', 'Ajout de produit')
@section('h1', 'Ajouter un produit')

@section('content')

    <form class="user" method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" placeholder="Nom du produit..." name="nom" value="{{ old('nom') }}">
                    @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <input type="number" class="form-control @error('quantite') is-invalid @enderror" placeholder="Saisissez la quantité..." name="quantite" value="{{ old('quantite') }}">
                    @error('quantite')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <input type="text" class="form-control @error('prix') is-invalid @enderror" placeholder="Entrez le prix..." name="prix" value="{{ old('prix') }}">
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
                              old('categorie_id') == $category->id ? 'selected' : '' }}> {{ $category->libelle }} </option>
                        @endforeach
                    </select>
                    @error('categorie_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>


        <button type="submit" class="btn btn-primary">
            Enregistrer
        </button>

        <a href="{{route('products.index')}}" class="btn btn-secondary">Retour</a>

    </form>

@endsection
