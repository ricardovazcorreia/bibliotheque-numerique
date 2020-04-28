@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('categorie', ['slug' => $livre->categorie->slug])}}">{{ $livre->categorie->nom }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $livre->title }}</li>
        </ol>
    </nav>

    <!-- Content Row -->
    <div class="row mt-4">
        <div class="col-md-3 col-xs-3">
            <div class="book-container">
                <img src="{{ asset($livre->couverture) }}" alt="" width="100%" height="300px">
            </div>
            
            <div class="mt-2">
                <a href="{{ route('livre.lire', ['slug' => $livre->slug]) }}" title="Lire" class="btn btn-primary px-3 float-left"> <i class="fab fa-readme"></i> &nbsp;Lire</a>
                
                @if ($result)
                    <a href="{{ route('livrary.retirer', ['slug' => $livre->slug])}}" class="btn btn-primary float-right px-4" title="Retirer de notre playlist"><i class="fas fa-bookmark"></i></a>
                @else       
                    <a href="{{ route('livrary.store', ['slug' => $livre->slug]) }}" class="btn btn-outline-primary float-right px-4" title="Sauvegarder pour plus tard"><i class="far fa-bookmark"></i></a>
                @endif          
            </div>
         </div>
        <div class="col-md-9 col-xs-9">
            <h5><strong>{{ $livre->title }}</strong></h5>
            <p>De <span class="text-primary">{{ $livre->auteur }}</span></p>
            <div class="dropdown-divider"></div>
            <p class="text-justify">{!! $livre->synopsis !!}</p>
            <p class="font-weight-bold"><i class="far fa-file-alt"></i> &nbsp;{{ $livre->pages }} pages</p>
        </div>
    </div>
@endsection