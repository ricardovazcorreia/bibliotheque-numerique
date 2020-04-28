@extends('layouts.app')

@section('content')

<!-- Content Row -->
@if(Auth::user()->admin == 1)
    <div class="row">
        <!-- Card Livre -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Livres</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $livres_count }}</div>
                        </div>
                        <div class="col-auto">       
                            <i class="fas fa-book-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Categories -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Categories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fab fa-buffer fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Etudiants -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Etudiants</div>   
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $etudiants_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Administrateur -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Administrateur</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Afficher les livres -->
<div class="row mt-4">
    <div class="col-md-12 col-xl-12">
        <h2>Livres</h2>
        <p>Trouvez votre livre préféré</p>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="categories-tab" data-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="false">Catégories</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
              <!-- LISTE DES LIVRES -->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row py-3">
                    @foreach($livres as $livre)
                        <div class="col-xl-2 col-md-2">
                            <a href="{{ route('livre.detail', ['slug' => $livre->slug]) }}">
                                <div class="card card-book">
                                    <img src="{{ asset($livre->couverture) }}" class="card-img-top img-fluid" alt="">
                                    <div class="card-body py-2 px-2">
                                        <h5 class="card-title">{{ $livre->title }}</h5>
                                        <p class="card-text">{{ $livre->auteur }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- LISTE DES CATEGORIES -->
            <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                
                    <div class="row mt-1">
                        @foreach($categories as $categorie)
                            <div class="col-md-3">
                                <div class="card shadow mt-3">
                                    <a href="{{ route('categorie', ['slug' => $categorie->slug]) }}">
                                    <div class="card-body">
                                        <h5 class="card-title text-center mb-0">{{ $categorie->nom }}</h5>
                                    </div>
                                    </a>
                                </div>                          
                            </div>
                        @endforeach
                    </div>
                
            </div>
          </div>
    </div>
</div>


@endsection
