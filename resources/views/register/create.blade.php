<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Créer un compte</h1>
                            </div>

                            <form class="user" method="POST" action="{{ route('register.store') }}">
                                @csrf

                                {{-- Nom --}}
                                <div class="form-group">
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Nom..."
                                           name="name"
                                           value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="form-group">
                                    <input type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="Adresse Email..."
                                           name="email"
                                           value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Rôle --}}
                                <div class="form-group">
                                    <select name="role"
                                            class="form-control @error('role') is-invalid @enderror">
                                        <option value="">-- Sélectionner votre rôle --</option>
                                        <option value="admin"   {{ old('role') == 'admin'   ? 'selected' : '' }}>Administrateur</option>
                                        <option value="employe" {{ old('role') == 'employe' ? 'selected' : '' }}>Employé(e)</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Mot de passe --}}
                                <div class="form-group">
                                    <input type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="Mot de passe..."
                                           name="password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Confirmation mot de passe --}}
                                <div class="form-group">
                                    <input type="password"
                                           class="form-control"
                                           placeholder="Confirmez le mot de passe..."
                                           name="password_confirmation">
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">
                                    Enregistrer
                                </button>
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('reset') }}">Mot de passe oublié ?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('welcome') }}">Déjà un compte ? Connectez-vous !</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>
