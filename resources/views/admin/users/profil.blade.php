@extends('layouts.app')

@section('content')
    <!-- Content row -->
    <div class="row">
        <div class="col-md-3">
            <div class="card card-user shadow">
                <img src="{{ asset($user->avatar) }}" alt="{{ $user->prenom }}" class="avatar">
                <div class="card-body text-center">
                    <h5 class="card-title titre">{{ $user->prenom }} {{ $user->nom }}</h5>
                    <ul class="card-profil_info">
                        <li>
                            <strong><i class="fas fa-phone-alt"></i></strong>&nbsp;&nbsp;
                            <span>{{ $user->telephone }}</span>
                        </li>
                        <li>
                            <strong><i class="fas fa-map-marker-alt"></i></strong>&nbsp;&nbsp;&nbsp;&nbsp;
                            <span>{{ $user->adresse }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </li>
                        <li>
                            <strong><i class="fas fa-envelope"></i></strong>
                            <span>{{ $user->email }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Modifier profil</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('profil.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    <div class="invalid-feedback">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Confirmation de password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <img id="upload_avatar" src="{{ asset($user->avatar) }}" alt="Avatar" width="150px" height="150px">
                                <div class="form-group mt-2 upload">
                                    <input type="file" id="avatar" name="avatar" class="@error('avatar') is-invalid @enderror"  onchange="readURL(this);">
                                    <label for="avatar">Choisir une photo</label>
                                    <div class="invalid-feedback">
                                        @error('avatar')
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
                    $('#upload_avatar')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection