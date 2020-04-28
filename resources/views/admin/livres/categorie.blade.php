@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
    </ol>
</nav>

<div class="row py-3">
    @if($livres->count() > 0)
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
    @else 
        <div class="col-xl-12 col-md-12">
            <h5 class="text-center">Aucun livre correspondant à cette categorie.</h5>
        </div>
    @endif
</div>
@endsection