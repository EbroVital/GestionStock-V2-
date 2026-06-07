@extends('template')

@section('title', 'Liste des employés')
@section('h1', 'Liste des employés')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Nom & prénom(s)</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Rôle</th>
                                <th class="text-center">Enregistré le</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="text-center"> {{ Str::ucfirst($user->name) }} </td>
                                    <td class="text-center">
                                        {{ $user->email }}
                                    </td>
                                    <td class="text-center"> {{ $user->role }} </td>
                                    <td class="text-center">
                                        {{ $user->created_at }}
                                    </td>
                                    <td class="text-center">
                                        @if ( $user->role === "admin" )
                                            <a href="" class="btn btn-danger disabled"> Supprimer </a>
                                        @else
                                            <form action="{{route('users.destroy', $user)}}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous supprimer cet employé ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">
                                                    Supprimer
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <p class="alert alert-danger text-center">
                                            Aucun employé enregistré !
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
