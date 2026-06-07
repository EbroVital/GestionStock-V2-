@extends('template')

@section('title', 'Liste des catégories')
@section('h1', 'Liste des catégories')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Libellé</th>
                                <th class="text-center">Ajouté le </th>
                                <th class="text-center" colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td class="text-center"> {{ $category->id }} </td>
                                    <td class="text-center"> {{ Str::ucfirst($category->libelle) }} </td>
                                    <td class="text-center"> {{ $category->created_at->format('d/m/Y') }} </td>
                                    <td class="text-center">
                                            <a href="{{route('categories.edit', $category)}}" class="btn btn-primary">Modifier</a>

                                            <a href="{{route('categories.show', $category)}}" class="btn btn-warning">Voir</a>

                                            <form action="{{route('categories.destroy', $category)}}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous supprimer cette catégorie ?')">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger">
                                                    Supprimer
                                                </button>

                                            </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <p class="alert alert-danger text-center">
                                            Aucune catégorie ajoutée !
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
