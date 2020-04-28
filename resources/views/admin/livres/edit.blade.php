@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('livres') }}">Livres</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $livre->title }}</li>
        </ol>
    </nav>


    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12 col-xs-12">
             <!-- Form Edit  Etudiant -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Modifier: {{ $livre->title }}</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('livre.update', ['id' => $livre->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="row">
                            <div class="col-md-9">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="title">Titre</label>
                                        <input type="text" id="title" name="title" value="{{ $livre->title }}" class="form-control @error('title') is-invalid @enderror" placeholder="Titre de livre">
                                        <div class="invalid-feedback">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="auteur">Auteur</label>
                                        <input type="text" name="auteur" value="{{ $livre->auteur }}" class="form-control @error('auteur') is-invalid @enderror" placeholder="Auteur d'auteur">
                                        <div class="invalid-feedback">
                                            @error('auteur')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="fpages">Nombre Pages</label>
                                        <input type="number" name="pages" value="{{ $livre->pages }}" id="fpages" class="form-control @error('pages') is-invalid @enderror" placeholder="Nombre de pages">
                                        <div class="invalid-feedback">
                                            @error('pages')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="fcategorie">Categorie</label>
                                        <select name="categorie_id" id="fcategorie" class="form-control @error('categorie_id') is-invalid @enderror">
                                            @foreach($categories as $categorie)
                                                
                                                <option value="{{ $categorie->id }}" 
                                                    @if($livre->categorie_id == $categorie->id) 
                                                        selected
                                                    @endif>
                                                    {{ $categorie->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('categorie_id') 
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="fsynopsis">Synopsis</label>
                                    <textarea name="synopsis" id="fsynopsis" rows="4" class="form-control @error('synopsis') is-invalid @enderror">{{ $livre->synopsis }}</textarea>
                                    <div class="invalid-feedback">
                                        @error('synopsis')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Livre électronique (.pdf)</label>
                                    <input type="file" name="livre" class="form-control @error('livre') is-invalid @enderror"" id="flivre">
                                        
                                    <div class="invalid-feedback">
                                        @error('livre')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>                   

                            </div>

                            <div class="col-md-3">
                                <img id="upload_user" src="{{ asset($livre->couverture) }}" alt="Ajouter un livre" width="150" height="150">
                                <div class="form-group mt-2 upload">
                                    <input type="file" name="couverture" accept="image/*" id="fcouverture" class="@error('couverture') is-invalid @enderror"  onchange="readURL(this);">
                                    <label for="fcouverture" class="ml-3"> <i class="fas fa-upload"></i>&nbsp; Couverture</label>
                                    <div class="invalid-feedback">
                                        @error('couverture')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <button type="submit" class="btn btn-primary">Modifier</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#upload_user')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        tinymce.init({
            selector: '#fsynopsis'
        });
    </script>
@endsection