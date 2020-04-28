@extends('layouts.app')

@section('datatables-styles')
    <!--  Datatables CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/jquery.dataTables.min.css') }}">
@endsection

@section('content')
    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page">Categories</li>
        </ol>
    </nav>
    

    <a class="btn btn-primary mb-2 px-4 btn-sm" href="{{ route('categorie.create') }}">
        <i class="fas fa-plus"></i>
    </a>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12 col-xs-12">
             <!-- DataTales Categories -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Liste Categories</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="categories" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Categorie</th>
                                    <th class="text-right">Modifier</th>
                                    <th class="text-right">Supprimer</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Categorie</th>
                                    <th class="text-right">Modifier</th>
                                    <th class="text-right">Supprimer</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($categories as $categorie)
                                    <tr>
                                        <td>{{ $categorie->nom }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('categorie.edit', ['id' => $categorie->id])}}" class="btn btn-dark btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('categorie.delete', ['id' => $categorie->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer cette categorie ?')">
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

@section('datatables-js')
    <!-- DataTables JS -->
    <script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#categories').DataTable({
                language: {
                    processing:     "Traitement en cours...",
                    search:         "Rechercher&nbsp;:",
                    lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
                    info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix:    "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable:     "Aucune donnée disponible dans le tableau",
                    paginate: {
                        first:      "Premier",
                        previous:   "Pr&eacute;c&eacute;dent",
                        next:       "Suivant",
                        last:       "Dernier"
                    },
                    aria: {
                        sortAscending:  ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                    }
                }
            });
        });
    </script>
@endsection