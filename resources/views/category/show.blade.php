@extends('template')

@section('title', 'Voir la catégorie')
@section('h1', 'Voir une catégorie')

@section('content')

   <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> La catégorie : {{
                Str::ucfirst($category->libelle) }} </h6>
        </div>
        <div class="card-body">
            - Créer le : {{ $category->created_at->format('d/m/Y') }} <br>
            - Contient : {{ $category->products()->count() }} produit(s) <br>
            @foreach ($category->products as $produit)
              &nbsp;&nbsp;&nbsp; * {{ $produit->nom }} <br>
            @endforeach
        </div>
        <div class="card-footer">
            <a href="{{route('categories.index')}}" class="btn btn-primary">Retour</a>
        </div>
    </div>

@endsection
