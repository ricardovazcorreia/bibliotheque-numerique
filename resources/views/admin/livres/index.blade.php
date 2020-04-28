@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page">Livres</li>
        </ol>
    </nav>

    <a class="btn btn-primary mb-2 px-4 btn-sm" href="{{ route('livre.create') }}">
        <i class="fas fa-plus"></i>
    </a>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12 col-xs-12">
             <!-- DataTales Livres -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Liste des Livres</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Couverture</th>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Couverture</th>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($livres as $livre)
                                    <tr>
                                        <td><img src="{{ asset($livre->couverture) }}" alt="{{ $livre->title }}" width="40px"></td>
                                        <td>{{ $livre->title }}</td>
                                        <td>{{ $livre->auteur }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('livre.edit', ['id' => $livre->id])}}" class="btn btn-dark btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        
                                            <a href="{{ route('livre.delete', ['id' => $livre->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer ce livre ?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection