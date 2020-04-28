@extends('layouts.header')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="login100-more" style="background-image: url({{ asset('front/images/books.jpg') }});"></div>
            
            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                    
                    <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                        @csrf

                        <span class="login100-form-title p-b-59">
                            Se connecter
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <span class="label-input100">Email</span>
                            <input class="input100" type="text" name="email" placeholder="Courrier electronique">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="password" placeholder="Mot de passe">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button type="submit" class="login100-form-btn">
                                    Se connecter
                                </button>
                            </div>
                        </div>

                    </form>


            </div>
        </div>
    </div>           
@endsection
