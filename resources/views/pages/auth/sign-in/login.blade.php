@extends('pages.app')
@section('guest-content')
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                <div class="loginbox shadow">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Connexion</h1>
                            <p class="account-subtitle">Accéder à votre tableau de bord</p>
                            <form action="index.html" id="loginForm">
                                <div class="form-group">
                                    <label class="form-control-label">Adresse Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Mot De Passe</label>
                                    <div class="pass-group">
                                        <input type="password" class="form-control pass-input" name="password">
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cb1">
                                                <label class="custom-control-label" for="cb1">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a class="forgot-link" href="forgot-password.html">Mot de passe oublié ?</a>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-block btn-primary w-100" type="submit" id="submitBtn">
                                    <span class="normal-status"> Se connester
                                    </span>
                                    <span class="indicateur d-none">
                                        <span class="spinner-border spinner-border-sm me-1" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </span>

                                </button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    {{-- <script src="{{ asset('assets/js/parsley.min.js') }}"></script> --}}

    <script src="{{ asset('app-js/auth/login.js') }}"></script>
@endpush
