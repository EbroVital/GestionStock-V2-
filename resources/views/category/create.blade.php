@extends('template')

@section('title', 'Ajout de catégorie')
@section('h1', 'Ajouter une catégorie')

@section('content')

    <form class="user" method="POST" action="{{route('categories.store')}}">
        @csrf
            <div class="form-group">
                <input type="text" class="form-control @error('libelle') is-invalid @enderror" placeholder="Entrez le libellé de la catégorie..." name="libelle" value="{{ old('libelle') }}" autofocus>
                @error('libelle')
                    <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Enregistrer
            </button>

            <a href="{{route('categories.index')}}" class="btn btn-secondary">Retour</a>

    </form>

@endsection
