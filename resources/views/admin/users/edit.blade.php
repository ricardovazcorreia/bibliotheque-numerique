@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('etudiants') }}">Etudiants</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $etudiant->prenom }} {{ $etudiant->nom }}</li>
        </ol>
    </nav>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12 col-xs-12">
             <!-- Form Edit  Etudiant -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Modifier: {{ $etudiant->prenom }} {{ $etudiant->nom }}</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('etudiant.update', ['id' => $etudiant->id]) }}" method="POST">
                        @csrf 
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fprenom">Prénom</label>
                                <input type="text" name="prenom" value="{{ $etudiant->prenom }}" id="fprenom" class="form-control @error('prenom') is-invalid @enderror" placeholder="Prénom">
                                <div class="invalid-feedback">
                                    @error('prenom')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="fnom">Nom</label>
                                <input type="text" name="nom" value="{{ $etudiant->nom }}" id="fnom" class="form-control @error('nom') is-invalid @enderror" placeholder="Nom">
                                <div class="invalid-feedback">
                                    @error('nom')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fadresse">Adresse</label>
                                <input type="text" name="adresse" value="{{ $etudiant->adresse }}" id="fadresse" class="form-control @error('adresse') is-invalid @enderror" placeholder="Rue xxx Quartier">
                                <div class="invalid-feedback">
                                    @error('adresse')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ftelephone">Téléphone</label>
                                <input type="text" name="telephone" value="{{ $etudiant->telephone }}" id="ftelephone" class="form-control @error('telephone') is-invalid @enderror" placeholder="XX XXX XX XX">
                                <div class="invalid-feedback">
                                    @error('telephone')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="femail">Email</label>
                            <input type="email" name="email" value="{{ $etudiant->email }}" id="femail" class="form-control @error('email') is-invalid @enderror" placeholder="email@ipcom-technology.net">
                            <div class="invalid-feedback">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </div>
@endsection