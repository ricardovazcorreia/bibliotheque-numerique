@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
      <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
      <li class="breadcrumb-item active" aria-current="page">Formulaire de categorie</li>
    </ol>
</nav>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ajouter une nouvelle categorie</h6> 
            </div>

            <div class="card-body">
                <form action="{{ route('categorie.store') }}" method="POST">
                    @csrf 
                    <div class="form-group row">
                        <label for="nom" class="col-sm-2 col-form-label">Categorie</label>
                        <div class="col-sm-10">
                            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection