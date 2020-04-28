@extends('layouts.app')

@section('content')
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

            <div class="card" style="max-width: 540px">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset($etudiant->avatar) }}" alt="" class="card-img" height="100%" style="border-radius: 3px 0 0 3px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $etudiant->prenom }} {{ $etudiant->nom }}</h5>
                            <span class="text-muted">
                                @if($etudiant->admin == 0)
                                    Etudiant(e)
                                @else 
                                    Administrateur
                                @endif
                            </span>
                            <div class="dropdown-divider"></div>
                            <ul class="card-profil_info">
                                <li>
                                    <strong><i class="fas fa-map-marker-alt"></i></strong>&nbsp;&nbsp;&nbsp;
                                    <span>{{ $etudiant->adresse }}</span>
                                </li>
                                <li>
                                    <strong><i class="fas fa-phone-alt"></i></strong>&nbsp;&nbsp;&nbsp;
                                    <span>{{ $etudiant->telephone }}</span>
                                </li>
                                <li>
                                    <strong><i class="fas fa-envelope"></i></strong>&nbsp;&nbsp;&nbsp;
                                    <span>{{ $etudiant->email }}</span>
                                </li>
                                <li>
                                    <strong><i class="fas fa-calendar-alt"></i></strong>&nbsp;&nbsp;&nbsp;
                                    <span>{{ $etudiant->created_at->toFormattedDateString() }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection