@extends('template')

@section('title', 'Opération')
@section('h1', 'Nouvelle Opération')

@section('content')

    <form class="user" method="POST" action="{{ route('mouvements.store') }}">
        @csrf

            <div class="form-group">
                    <select name="produit_id" class="form-control @error('produit_id') is-invalid @enderror">
                        <option value="">-- Sélectionnez le produit --</option>
                        @foreach ($produits as $produit)
                            <option value="{{ $produit->id }}" {{
                              old('produit_id') == $produit->id ? 'selected' : '' }}> {{ $produit->nom }} ({{ $produit->quantite }})  </option>
                        @endforeach
                    </select>
                    @error('produit_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>

            <div class="form-group">
                <input type="number" class="form-control @error('quantite') is-invalid @enderror" placeholder="Saisissez la quantité..." name="quantite" value="{{ old('quantite') }}">
                @error('quantite')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <select name="type" class="form-control @error('type') is-invalid @enderror">
                    <option value="">-- Sélectionnez le type --</option>
                    <option value="entree">Entrée</option>
                    <option value="sortie">Sortie</option>
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Enregistrer
            </button>

            <a href="{{route('mouvements.index')}}" class="btn btn-secondary">Retour</a>

    </form>

@endsection
