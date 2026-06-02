@extends('template')

@section('title', 'Modifier de catégorie')
@section('h1', 'Modifier une catégorie')

@section('content')

    <form class="user" method="POST" action="{{route('categories.update', $category->id)}}">
        @method('PUT')
        @csrf
            <div class="form-group">
                <input type="text" class="form-control @error('libelle') is-invalid @enderror" placeholder="Entrez le libellé de la catégorie..." name="libelle" value="{{ $category->libelle }}" autofocus>
                @error('libelle')
                    <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
            </div>

        <button type="submit" class="btn btn-primary">
            Modifier
        </button>
    </form>

@endsection
